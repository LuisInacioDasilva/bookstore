@extends('catalog.layout')

@section('title', $dados->titulo.' · Bookstore Discovery')

@section('content')
<section class="detail-section shell">
    <a class="back-link" href="{{ route('home') }}">← Voltar ao catálogo</a>
    @if (!empty($stale))<div class="notice" role="status">Esta ficha foi carregada da última versão salva.</div>@endif
    <div class="detail-panel">
        <div class="detail-cover">
            @if (!empty($dados->imagem))
                <img src="{{ $dados->imagem }}" alt="Capa de {{ $dados->titulo }}" referrerpolicy="no-referrer">
            @else
                <div class="cover-placeholder detail-placeholder"><span>B/</span><small>SEM CAPA DISPONÍVEL</small></div>
            @endif
        </div>
        <div class="detail-copy">
            <span class="section-index">FICHA / {{ $dados->id_livro ?? 'OPEN LIBRARY' }}</span>
            <h1>{{ $dados->titulo }}</h1>
            <p class="detail-byline">Uma leitura para descobrir. <span>Metadados da Open Library.</span></p>
            <div class="detail-facts">
                <div><span>PUBLICAÇÃO</span><strong>{{ !empty($dados->data_publicacao) ? $dados->data_publicacao : 'Sem informações de data' }}</strong></div>
                <div><span>AUTORIA</span><strong>{{ $dados->autor ?? 'Consulte a ficha original' }}</strong></div>
            </div>
            <div class="detail-description">
                <h2>Sobre esta obra</h2>
                @if (!empty($dados->descricao_livro))
                    <p>{!! nl2br(e(\Illuminate\Support\Str::limit($dados->descricao_livro, 1800))) !!}</p>
                @else
                    <p>A fonte ainda não publicou uma descrição para este título. A ficha original pode conter edições e outros metadados.</p>
                @endif
            </div>
            @if (!empty($dados->assuntos))
                <div class="subject-list" aria-label="Assuntos">
                    @foreach (array_slice(array_filter(array_map('trim', explode(',', $dados->assuntos))), 0, 6) as $subject)
                        <span>{{ $subject }}</span>
                    @endforeach
                </div>
            @endif
            @if (!empty($dados->id_livro))
                <a class="source-button" href="https://openlibrary.org/works/{{ $dados->id_livro }}" target="_blank" rel="noopener noreferrer">Abrir ficha original <span aria-hidden="true">↗</span></a>
            @endif
        </div>
    </div>
</section>
@endsection
