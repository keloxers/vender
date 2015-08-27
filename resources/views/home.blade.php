@extends('layouts.default')
@section('content')



  <div id="page_content_inner">
    <div class="md-card">
      <div class="md-card-content">


              <h3 class="heading_a uk-margin-bottom">{{$title}}</h3>


              <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}">




                            @foreach ($articulos as $articulo)

                              <div data-product-name="{{$articulo->articulo}}">
                                  <div class="md-card md-card-hover-img">
                                      <div class="md-card-head uk-text-center uk-position-relative">
                                          <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ {{$articulo->precio}}</div>
                                          <a href="/articulos/{{$articulo->url}}">
                                          <img class="md-card-head-img" src="
                                                <?php
                                                if ($articulo->url_foto=="") {
                                                  echo "/images/sinfoto.jpg";
                                                } else {
                                                  echo "/uploads/crop/" . $articulo->url_foto;
                                                }
                                                ?>
                                          " alt=""/>
                                          </a>
                                      </div>
                                      <div class="md-card-content">
                                          <h4 class="heading_c uk-margin-bottom">
                                              {{$articulo->articulo}}
                                              
                                          </h4>

                                          <a class="md-btn md-btn-small" href="/articulos/{{$articulo->url}}">Más</a>
                                      </div>
                                  </div>
                              </div>

                            @endforeach








              </div>

{!! $articulos->render() !!}

          </div>
      </div>

</div>




@stop
