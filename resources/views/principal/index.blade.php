@extends('template.template')

@section('conteudo')

    <!-- Barra superior -->   
    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container">
            <img src="../assets/favicon2.png" alt="" width="30%">
        </div>
    </nav>

    <!-- Corpo -->
    <div class="page-hero-section bg-image hero-home-1" style="background-image: url(../assets/img/bg_hero_1.svg);">
        <div class="hero-caption pt-5">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <h1 class="mb-4">Gerencie seus<br>dados aqui!</h1>
                        <p class="mb-4">Escolha abaixo a categoria do APP que você deseja gerenciar.</p>
                        <a href="/flores" class="btn btn-primary rounded-pill">Flores</a>
                        <br><br>
                        <a href="/artigos" class="btn btn-primary rounded-pill">⠀Artigos⠀</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="img-place floating-animate">
                            <img src="../assets/img/prototipo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Créditos -->
    <div class="page-footer-section bg-dark fg-white">
        <div class="container">
            <div class="row mb-5 py-3">
                <div class="col-sm-6 py-3">
                    <h5 class="mb-3">Sistema desenvolvido por alunos da<br>
                    Universidade Federal do Agreste de Pernambuco<br>
                    e do Instituto Federal de Pernambuco.</h5>
                </div>
                <div class="col-md-6 col-lg-4 py-3">
                    <h5 class="mb-3">Grupos de pesquisa envolvidos:</h5>
                    <p>• UNAME RESEARCH GROUP</p>
                    <p>• LAPAR</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-2">
                    <img src="../assets/favicon-light.png" alt="" width="40">
                    <p class="d-inline-block ml-2">Créditos template: &copy; <a href="https://www.macodeid.com/" class="fg-white fw-medium">MACode ID</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/mobster.js"></script>

@endsection