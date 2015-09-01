<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>CompraVenta Virasoro</title>


    <!-- uikit -->
    <link rel="stylesheet" href="/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="/assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="/assets/css/main.min.css" media="all">


    <link rel="stylesheet" href="/css/lightbox.css">

    <!-- FACEBOOK -->
    <meta content='{{$articulo->articulo}}' property='og:title'/>
    <meta content='http://vender.virasorovirtual.com/uploads/crop/{{$articulo->url_foto}}' property='og:image'/>
    <meta content='Mira este clasificado ingresa en http://vender.virasorovirtual.com/articulos/{{$articulo->url}}.' property='og:description'/>



</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=318129194920279";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body class="sidebar_main_open">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>

                        <li data-uk-dropdown="{mode:'click'}">
                            <a href="/videoayuda" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE04B;</i> Video ayuda</a>
                        </li>


                        <?php if (Auth::check()) { ?>
                        <li data-uk-dropdown="{mode:'click'}">
                            <a href="/articulos" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE85D;</i></a>
                        </li>

                        <li data-uk-dropdown="{mode:'click'}">
                            <a href="/articulos/create" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE150;</i></a>
                        </li>


                        <li data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7FD;</i></a>
                            <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="/perfil">Perfil</a></li>
                                    <li><a href="/logout">Salir</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php } else { ?>
                          <li data-uk-dropdown="{mode:'click'}">

                              <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7FD;</i></a>
                              <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                                  <ul class="uk-nav js-uk-prevent">
                                      <li><a href="/login">Ingresar</a></li>
                                      <li><a href="/register">Registrarse</a></li>
                                  </ul>
                              </div>
                          </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            {!! Form::open(array('url' => 'buscar', 'method' => 'post')) !!}
                <input type="text" class="header_main_search_input" name="texto" id="texto"/>
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
            {!! Form::close() !!}
        </div>
    </header><!-- main header end -->

    <!-- main sidebar -->
    <aside id="sidebar_main">
        <a href="#" class="uk-close sidebar_main_close_button"></a>
        <div class="sidebar_main_header">
            <div class="sidebar_logo"><a href="/"><img src="/assets/img/logo_main.png" alt="" width="190"/></a></div>
        </div>
        <div class="menu_section">
            <ul>

            <?php
                    $clasificadoscategorias = App\Clasificadoscategoria::where('activo', 1)
                                     ->orderBy('clasificadoscategoria')
                                     ->take(30)
                                     ->get();
            ?>


            @foreach ($clasificadoscategorias as $clasificadoscategoria)
                <li>
                    <a href="/c/{{$clasificadoscategoria->url}}">
                      {{$clasificadoscategoria->clasificadoscategoria}}
                      <?php
                          $count = App\Articulo::where('clasificadoscategorias_id', $clasificadoscategoria->id)->where('activo', 1)->count();
                      ?>
                      ({{$count}})
                    </a>
                </li>
            @endforeach


            </ul>
        </div>
    </aside><!-- main sidebar end -->



    <div id="page_content">

<?php
if (Auth::check()) {
if (Auth::user()->telefono=="") {

?>
  <div class="uk-alert uk-alert-danger" data-uk-alert>
    <a href="#" class="uk-alert-close uk-close"></a>
    Faltan datos en su perfil, debe agregar un teléfono de contacto, para que se puedan contactar con Ud.
    <a href="/perfil">Haga click aquí</a>
  </div>

<?php

}
}

?>










        <div id="page_heading">
            <h1>{!! $articulo->articulo !!}</h1>
            <div class="fb-like"></div><div class="fb-share-button" data-href="http://vender.virasorovirtual.com/articulos/{!! $articulo->url !!}" data-layout="button_count"></div><br>
            <span class="uk-text-muted uk-text-upper uk-text-small">Code: {!! $articulo->url !!}</span>
        </div>
        <div id="page_content_inner">

            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Foto
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="uk-margin-bottom uk-text-center">

                            <a class="example-image-link" href="/uploads/big/{{$articulo->url_foto}}" data-lightbox="example-1">

                                <img class="example-image" src="
                                    <?php
                                    if ($articulo->url_foto=="") {
                                      echo "/images/sinfoto.jpg";
                                    } else {
                                      echo "/uploads/crop/" . $articulo->url_foto;
                                    }
                                    ?>
                                " alt="" class="img_medium" />

                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Detalles
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <ul class="md-list">
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Precio</span>
                                        <span class="md-list-heading uk-text-large uk-text-success">$ {!! $articulo->precio !!}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-content">
                                        <span class="uk-text-small uk-text-muted uk-display-block">Stock</span>
                                        <span class="md-list-heading uk-text-large">{!! $articulo->stock !!}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                    <div class="md-card">
                      <div class="md-card-content">


                        <div class="uk-width-large-10-10">
                            <div class="md-card">
                                <div class="user_heading">
                                    <div class="user_heading_menu" data-uk-dropdown>
                                        <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                        <div class="uk-dropdown uk-dropdown-flip uk-dropdown-small">
                                            <ul class="uk-nav">
                                                <li><a href="/{{ App\User::find($articulo->users_id)->name }}">Sus articulos</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="user_heading_avatar">

                                    </div>
                                    <div class="user_heading_content">
                                        <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Usuario: {{ App\User::find($articulo->users_id)->name }}</span><a class="md-btn md-btn-success" href="/{{ App\User::find($articulo->users_id)->name }}">Ver todos sus productos</a><br><br><span class="sub-heading">Telefono: {{App\User::find($articulo->users_id)->telefono}}</span></h2><br>
                                        <ul class="user_stats">
                                            <li>
                                                <h4 class="heading_a">{!! $cargados !!} <span class="sub-heading">Cargados</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">{!! $publicados !!} <span class="sub-heading">Publicados</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">{!! $articulo->visitas !!} <span class="sub-heading">Visitas</span></h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>




                      </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Descripcion
                            </h3>
                        </div>
                        <div class="md-card-content">
                            {!! $articulo->descripcion !!}
                        </div>
                    </div>
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <h3 class="md-card-toolbar-heading-text">
                                Comentarios y Preguntas
                            </h3>
                        </div>
                        <div class="fb-comments" data-href="http://vendo.virasorovirtual.com/articulos/{!! $articulo->url !!}" data-width="600" data-numposts="15"></div>
                    </div>
                </div>
            </div>

        </div>


            </div>

            <!-- google web fonts -->
            <script>
                WebFontConfig = {
                    google: {
                        families: [
                            'Source+Code+Pro:400,700:latin',
                            'Roboto:400,300,500,700,400italic:latin'
                        ]
                    }
                };
                (function() {
                    var wf = document.createElement('script');
                    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
                    wf.type = 'text/javascript';
                    wf.async = 'true';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(wf, s);
                })();
            </script>

            <!-- momentJS date library -->
            <script src="/bower_components/moment/min/moment.min.js"></script>

            <!-- common functions -->
            <script src="/assets/js/common.min.js"></script>
            <!-- uikit functions -->
            <script src="/assets/js/uikit_custom.min.js"></script>
            <!-- altair common functions/helpers -->
            <script src="/assets/js/altair_admin_common.min.js"></script>


            <!-- enable hires images -->
            <script>
                $(function() {
                    altair_helpers.retina_images();
                });
            </script>

            <script src="/js/lightbox-plus-jquery.min.js"></script>

        </body>
        </html>
