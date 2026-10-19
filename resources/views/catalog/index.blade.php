@extends('catalog.layout')

@section('title', 'Descubra sua próxima leitura · Bookstore Discovery')

@section('content')
@php
    $term = $term ?? '';
    $theme = $theme ?? 'literatura';
    $themes = $themes ?? ['literatura' => ['label' => 'Literatura']];
    $page = $page ?? 1;
    $total = $total ?? count($dados);
@endphp
<section class="hero">
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="shell hero-inner">
        <div class="hero-copy">
            <span class="eyebrow"><span class="eyebrow-line"></span> UM UNIVERSO DE HISTÓRIAS À SUA FRENTE</span>
            <h1>Encontre o livro que <em>fica com você.</em></h1>
            <p>Pesquise por título, autor ou assunto. Navegue com calma, encontre sua próxima leitura e abra a ficha original quando quiser ir mais fundo.</p>
            <form class="search" action="{{ route('home') }}" method="get" role="search">
                <label class="sr-only" for="book-search">Buscar livros</label>
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.7" cy="10.7" r="6.2"/><path d="m15.4 15.4 5 5"/></svg>
                <input id="book-search" name="q" type="search" value="{{ $term }}" maxlength="80" minlength="2" placeholder="Título, autor ou tema..." autocomplete="off">
                <button type="submit">Buscar <span aria-hidden="true">↗</span></button>
            </form>
            @if ($errors->any())<p class="form-error" role="alert">Digite pelo menos 2 caracteres e no máximo 80 para buscar.</p>@endif
            <div class="hero-foot"><span class="live-dot" aria-hidden="true"></span> Curadoria para pessoas, sem compras ou anúncios.</div>
        </div>
        <div class="hero-art" aria-hidden="true">
            <div class="orbit orbit-one"></div><div class="orbit orbit-two"></div>
            <div class="art-book art-book-one"><span>01</span><strong>IDEIAS</strong><small>QUE MOVEM</small></div>
            <div class="art-book art-book-two"><span>02</span><strong>OUTROS</strong><small>MUNDOS</small></div>
            <div class="art-book art-book-three"><span>03</span><strong>NOVAS</strong><small>PERGUNTAS</small></div>
            <span class="art-star star-one">✦</span><span class="art-star star-two">✦</span>
            <span class="art-caption">DESCUBRA · LEIA · RECOMECE</span>
        </div>
    </div>
</section>

<section id="explorar" class="catalog-section shell">
    <div class="section-head">
        <div><span class="section-index">01 / EXPLORAR</span><h2>{{ $term !== '' ? 'Resultados da sua busca' : 'Escolha um caminho' }}</h2>
            <p>{{ $term !== '' ? 'Busca por “'.$term.'”' : 'Seleções para começar a explorar o acervo.' }}</p></div>
        <span class="result-count">{{ number_format($total, 0, ',', '.') }} registro(s) encontrados</span>
    </div>
    @if (!empty($stale))<div class="notice" role="status">Estamos exibindo a última consulta salva enquanto a fonte de dados se recupera.</div>@endif
    <nav class="theme-list" aria-label="Filtrar por tema">
        @foreach ($themes as $slug => $item)
            <a class="theme-chip {{ $term === '' && $theme === $slug ? 'active' : '' }}" href="{{ route('home', ['tema' => $slug]) }}">{{ $item['label'] }} <span aria-hidden="true">↗</span></a>
        @endforeach
    </nav>
    @if (count($dados) === 0)
        <div class="empty-state"><span aria-hidden="true">◎</span><h3>Nenhum título por aqui.</h3><p>Tente outro autor, assunto ou uma categoria acima.</p></div>
    @else
        <div class="book-grid">
            @foreach ($dados as $item)
                <article class="book-card">
                    <a class="cover-link" href="{{ route('busca-livro', $item->id_livro) }}" aria-label="Ver detalhes de {{ $item->titulo }}">
                        @if (!empty($item->imagem))
                            <img src="{{ $item->imagem }}" alt="Capa de {{ $item->titulo }}" loading="lazy" referrerpolicy="no-referrer">
                        @else
                            <span class="cover-placeholder" aria-hidden="true"><span>B/</span><small>SEM CAPA</small></span>
                        @endif
                        <span class="cover-action" aria-hidden="true">↗</span>
                    </a>
                    <div class="card-body">
                        <span class="book-meta">{{ $item->ano ?? 'DATA NÃO INFORMADA' }} <span>·</span> {{ $item->edicoes ?? 0 }} EDIÇÕES</span>
                        <h3><a href="{{ route('busca-livro', $item->id_livro) }}">{{ $item->titulo }}</a></h3>
                        <p class="book-author">{{ $item->autores }}</p>
                        @if (!empty($item->descricao))<p class="book-excerpt">{{ \Illuminate\Support\Str::limit($item->descricao, 100) }}</p>@endif
                    </div>
                </article>
            @endforeach
        </div>
        <div class="pagination">
            @if ($page > 1)<a href="{{ route('home', ['q' => $term ?: null, 'tema' => $term ? null : $theme, 'page' => $page - 1]) }}">← Página anterior</a>@else<span></span>@endif
            <span>Página {{ $page }}</span>
            @if ($total > $page * 12 && $page < 100)<a href="{{ route('home', ['q' => $term ?: null, 'tema' => $term ? null : $theme, 'page' => $page + 1]) }}">Próxima página →</a>@else<span></span>@endif
        </div>
    @endif
</section>
@endsection
