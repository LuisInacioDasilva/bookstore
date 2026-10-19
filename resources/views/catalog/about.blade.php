@extends('catalog.layout')

@section('title', 'Sobre o projeto · Bookstore Discovery')

@section('content')
<section class="about-hero">
    <div class="shell">
        <span class="eyebrow"><span class="eyebrow-line"></span> O PROJETO</span>
        <h1>Uma livraria de <em>descobertas.</em></h1>
        <p>Esta aplicação começou como um catálogo em 2023. Voltei ao código para preservar a ideia boa — encontrar livros — e reconstruir o que faltava: uma interface própria, busca útil e uma integração que não pressiona a fonte a cada visita.</p>
    </div>
</section>
<section class="about-content shell">
    <div><span class="section-index">01 / EXPERIÊNCIA</span><h2>Menos ruído. Mais leitura.</h2><p>Pesquise por título, autor ou assunto. O site mostra a origem dos dados, sinaliza quando usa uma cópia recente e não inventa informações ausentes.</p></div>
    <div><span class="section-index">02 / ENGENHARIA</span><h2>Uma fonte externa pede cuidado.</h2><p>O catálogo usa paginação, limites de entrada, cache de seis horas, última resposta válida por dois dias, timeout e retry seletivo. A busca não é uma carga em massa na Open Library.</p></div>
    <div><span class="section-index">03 / HONESTIDADE</span><h2>Não é uma loja comercial.</h2><p>Não há checkout, pagamento ou inventário. Este é um projeto aberto de descoberta de livros, construído para demonstrar produto, integração e manutenção de código legado.</p></div>
    <a class="source-button" href="{{ route('home') }}">Explorar o catálogo <span aria-hidden="true">↗</span></a>
</section>
@endsection
