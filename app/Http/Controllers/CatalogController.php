<?php

namespace App\Http\Controllers;

use App\Services\OpenLibraryCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class CatalogController extends Controller
{
    private const THEMES = [
        'literatura' => ['label' => 'Literatura', 'query' => 'subject:literature'],
        'ficcao' => ['label' => 'Ficção', 'query' => 'subject:fiction'],
        'fantasia' => ['label' => 'Fantasia', 'query' => 'subject:fantasy'],
        'tecnologia' => ['label' => 'Tecnologia', 'query' => 'subject:computers'],
        'historia' => ['label' => 'História', 'query' => 'subject:history'],
    ];

    public function __construct(private readonly OpenLibraryCatalog $catalog)
    {
    }

    public function index(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'min:2', 'max:80'],
            'tema' => ['nullable', 'string', 'in:'.implode(',', array_keys(self::THEMES))],
            'page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $term = trim((string) ($validated['q'] ?? ''));
        $theme = (string) ($validated['tema'] ?? 'literatura');
        $page = (int) ($validated['page'] ?? 1);
        $query = $term !== '' ? $term : self::THEMES[$theme]['query'];

        try {
            $result = $this->catalog->search($query, $page);
        } catch (Throwable $error) {
            report($error);
            abort(503, 'Catálogo temporariamente indisponível.');
        }

        return view('catalog.index', [
            'dados' => $result['books'],
            'total' => $result['total'],
            'stale' => $result['stale'],
            'term' => $term,
            'theme' => $theme,
            'themes' => self::THEMES,
            'page' => $page,
        ]);
    }

    public function show(string $id_livro): View
    {
        try {
            $result = $this->catalog->work($id_livro);
        } catch (Throwable $error) {
            report($error);
            abort(503, 'Livro temporariamente indisponível.');
        }

        return view('catalog.show', [
            'dados' => $result['book'],
            'stale' => $result['stale'],
        ]);
    }

    public function about(): View
    {
        return view('catalog.about');
    }

    public function legacyCategory(Request $request)
    {
        $theme = (string) $request->query('categoria', 'literatura');
        abort_unless(isset(self::THEMES[$theme]), 404);

        return redirect()->route('home', ['tema' => $theme], 301);
    }
}
