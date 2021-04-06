<!DOCTYPE html>
<html lang="pt-br">
<style>
    .rounded-pill {
        border-radius: 50rem !important;
    }

    .padding {
        margin-top: 5px;
    }
</style>

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
   
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
        integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V"
        crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="/images/fevicon.png" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="/css/mobster.css">
</head>

<body>
    <div class="header_section">
        <div cla ss="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <a href="/">
                        <div class="logo"><img src="/images/logo.png"></div>
                    </a>

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
                    <p class="text-light">• GEAP-UFAPE</p>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright section start -->
    <div class="copyright">
        <div class="container">
            <p class="copyright_text">Copyright 2021 créditos do template.<a href="https://html.design"> Free html
                    Templates</a></p>
        </div>
    </div>
</body>

</html>