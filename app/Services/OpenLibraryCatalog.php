<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use RuntimeException;
use Throwable;

class OpenLibraryCatalog
{
    public function search(string $query, int $page = 1): array
    {
        $key = 'open-library:search:'.sha1($query.'|'.$page);

        return $this->cached($key, function () use ($query, $page): array {
            $payload = $this->fetch('/search.json', [
                'q' => $query,
                'page' => $page,
                'limit' => 12,
                'fields' => 'key,title,author_name,first_publish_year,cover_i,edition_count,first_sentence',
            ]);

            if (! isset($payload['docs']) || ! is_array($payload['docs'])) {
                throw new RuntimeException('Resposta de busca inválida.');
            }

            $books = [];
            foreach ($payload['docs'] as $book) {
                if (! is_array($book) || ! preg_match('~^/works/(OL[0-9]+W)$~', (string) ($book['key'] ?? ''), $match)) {
                    continue;
                }

                $authors = is_array($book['author_name'] ?? null) ? $book['author_name'] : [];
                $cover = filter_var($book['cover_i'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
                $books[] = (object) [
                    'id_livro' => $match[1],
                    'titulo' => trim((string) ($book['title'] ?? 'Sem título')),
                    'autores' => implode(', ', array_slice(array_filter($authors, 'is_string'), 0, 2)) ?: 'Autoria não informada',
                    'ano' => filter_var($book['first_publish_year'] ?? null, FILTER_VALIDATE_INT) ?: null,
                    'edicoes' => filter_var($book['edition_count'] ?? null, FILTER_VALIDATE_INT) ?: 0,
                    'imagem' => $cover ? "https://covers.openlibrary.org/b/id/{$cover}-M.jpg" : null,
                    'descricao' => is_array($book['first_sentence'] ?? null) ? (string) ($book['first_sentence'][0] ?? '') : '',
                ];
            }

            return ['books' => $books, 'total' => max(0, (int) ($payload['numFound'] ?? $payload['num_found'] ?? count($books)))];
        });
    }

    public function work(string $id): array
    {
        if (! preg_match('/^OL[0-9]+W$/', $id)) {
            throw new \InvalidArgumentException('Identificador inválido.');
        }

        return $this->cached('open-library:work:'.$id, function () use ($id): array {
            $book = $this->fetch("/works/{$id}.json");
            if (! isset($book['key']) || $book['key'] !== "/works/{$id}") {
                throw new RuntimeException('Resposta de livro inválida.');
            }

            $description = $book['description'] ?? '';
            if (is_array($description)) {
                $description = $description['value'] ?? '';
            }
            $cover = filter_var($book['covers'][0] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
            $subjects = is_array($book['subjects'] ?? null) ? array_slice(array_filter($book['subjects'], 'is_string'), 0, 6) : [];

            return ['book' => (object) [
                'id_livro' => $id,
                'titulo' => trim((string) ($book['title'] ?? 'Sem título')),
                'autor' => 'Consulte a ficha original',
                'descricao_livro' => trim((string) $description),
                'imagem' => $cover ? "https://covers.openlibrary.org/b/id/{$cover}-L.jpg" : null,
                'data_publicacao' => trim((string) ($book['first_publish_date'] ?? '')),
                'assuntos' => implode(', ', $subjects),
            ]];
        });
    }

    private function cached(string $key, callable $load): array
    {
        if (($fresh = Cache::get($key)) !== null) {
            return $fresh + ['stale' => false];
        }

        try {
            $result = $load();
            Cache::put($key, $result, now()->addHours(6));
            Cache::put($key.':last-good', $result, now()->addDays(2));

            return $result + ['stale' => false];
        } catch (Throwable $error) {
            if (($lastGood = Cache::get($key.':last-good')) !== null) {
                return $lastGood + ['stale' => true];
            }

            throw $error;
        }
    }

    private function fetch(string $path, array $query = []): array
    {
        $base = rtrim((string) config('services.open_library.base_url', 'https://openlibrary.org'), '/');
        $contact = trim((string) config('services.open_library.contact_email', ''));
        $agent = 'BookstoreDiscovery/2.0'.($contact !== '' ? " ({$contact})" : '');

        $response = Http::acceptJson()
            ->withHeaders(['User-Agent' => $agent])
            ->connectTimeout(2)
            ->timeout(5)
            ->retry(2, 1000, function (Throwable $error): bool {
                return $error instanceof ConnectionException
                    || ($error instanceof RequestException && in_array($error->response->status(), [502, 503, 504], true));
            })
            ->get($base.$path, $query);

        if (! $response->ok() || ! is_array($response->json())) {
            throw new RuntimeException('Catálogo temporariamente indisponível.');
        }

        return $response->json();
    }
}
