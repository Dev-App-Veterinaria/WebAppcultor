@extends('template.template')

@section('conteudo')
    <div class="header_section_gradient">
        <div class="hero-caption pt-5">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <h1 class="furniture_text ">Gerencie seus<br>dados aqui!</h1>
                        <h5 class="text-light">Escolha abaixo a categoria do APP que você deseja gerenciar.</h5>
                        <div style="width: 150px;">
                            <a href="/flores" class="btn btn-light btn-block">Doenças</a>
                            <a href="/artigos" class="btn btn-dark btn-block">Artigos</a>
                            <a href="/tags" class="btn btn-light btn-block">Artigos</a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="img-place floating-animate">
                            <img src="/images/prototipo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection