<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Appcultor</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
    <link rel="stylesheet" href="/css/mobster.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="header_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <div class="logo"><img src="/images/logo.png"></div>
            </div>
            <div class="col-sm-4 col-lg-5">
                <div class="menu-area">
                    <nav class="navbar navbar-expand-lg ">
                        <!-- <a class="navbar-brand" href="#">Menu</a> -->
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/flores">Flores</a></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/artigos">Artigos</a></li>
                                <li class="#" href="#">
                                    <a class="nav-link" href="/tags">Tags</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('conteudo')

<div class="footer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <h5 class="text-light">Sistema desenvolvido por alunos da
                    Universidade Federal do Agreste de Pernambuco
                    e do Instituto Federal de Pernambuco.</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <h2 class="useful_text">Grupos de pesquisa envolvidos</h2>
                <p class="text-light">• UNAME RESEARCH GROUP</p>
                <p class="text-light">• LAPAR</p>
            </div>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright">
    <div class="container">
        <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free html
                Templates</a></p>
    </div>
</div>
</body>
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery-3.0.0.min.js"></script>
<script src="/js/plugin.js"></script>
<!-- sidebar -->
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/custom.js"></script>
</html>