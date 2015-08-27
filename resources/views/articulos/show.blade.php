@extends('layouts.default')
@section('content')


        <div id="page_heading">
            <h1>{!! $articulo->articulo !!}</h1>
            <div class="fb-like"></div><div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div><br>
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
                                <img src="
                                    <?php
                                    if ($articulo->url_foto=="") {
                                      echo "/images/sinfoto.jpg";
                                    } else {
                                      echo "/uploads/crop/" . $articulo->url_foto;
                                    }
                                    ?>
                                " alt="" class="img_medium" />
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
                                                <li><a href="#">Action 1</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="user_heading_avatar">

                                    </div>
                                    <div class="user_heading_content">
                                        <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Usuario: {{ App\User::find($articulo->users_id)->name }}</span><span class="sub-heading">Telefono: {{App\User::find($articulo->users_id)->telefono}}</span></h2>
                                        <ul class="user_stats">
                                            <li>
                                                <h4 class="heading_a">0 <span class="sub-heading">Publicados</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">0 <span class="sub-heading">Cancelados</span></h4>
                                            </li>
                                            <li>
                                                <h4 class="heading_a">0 <span class="sub-heading">Vendidos</span></h4>
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


@stop
