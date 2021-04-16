@extends('template.template')

@section('conteudo')
<div class="header_section_gradient">
    <div class="hero-caption pt-5">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 wow fadeInUp">
                    @if (session()->has('token'))
                        <h1 class="furniture_text ">Gerencie seus<br>dados aqui!</h1>
                        <h5 class="text-light">Escolha abaixo a categoria do APP que você deseja gerenciar.</h5>
                        <a href="/flores">
                            <button class="btn btn-light">FLORES</button>
                        </a>
                        <br><br>
                        <a href="/artigos">
                            <button class="btn btn-dark">ARTIGOS</button>
                        </a>
                        <br><br>
                        <a href="/tags">
                            <button class="btn btn-light">TAGS</button>
                        </a>
                    @else
                        <h1 class="mb-4">Entre para<br> gerenciar os dados!</h1>
                        <div style="width: 150px;">
                            <a href="/login" class="btn btn-light">Login</a>
                        @endif
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