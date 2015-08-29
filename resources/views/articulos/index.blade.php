@extends('layouts.default')
@section('content')


  <div id="page_content_inner">
      <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
          <div class="uk-width-large-10-10">
              <div class="md-card">
                  <div class="user_heading">
                      <div class="user_heading_menu" data-uk-dropdown>
                          <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                          <div class="uk-dropdown uk-dropdown-flip uk-dropdown-small">
                              <ul class="uk-nav">
                                  <li><a href="/perfil">Editar perfil</a></li>
                              </ul>
                          </div>
                      </div>
                      <!-- <div class="user_heading_avatar">
                          <img src="{{Auth::user()->avatar}}" alt="user avatar"/>
                      </div> -->
                      <div class="user_heading_content">
                          <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Usuario: {{Auth::user()->username}}</span><span class="sub-heading">{{Auth::user()->email}}</span></h2>
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
                      <a class="md-fab md-fab-small md-fab-accent" href="/perfil">
                          <i class="material-icons">&#xE150;</i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>



        <div id="page_content_inner">



            <div class="md-card">
                <a class="md-btn md-btn-success" href="/articulos/create">Agregar nuevo clasificado</a>
                <div class="md-card-content">

                  <div class="user_heading_content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Articulo</th>
                                            <th class="uk-text-center">Precio</th>
                                            <th class="uk-text-center">Cantidad</th>
                                            <th>Estado</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    @foreach ($articulos as $articulo)


                                        <tr>
                                            <td><img class="img_thumb" src="
                                                  <?php
                                                  if ($articulo->url_foto=="") {
                                                    echo "/images/sinfoto.jpg";
                                                  } else {
                                                    echo "/uploads/crop/" . $articulo->url_foto;
                                                  }
                                                  ?>
                                            " alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="/articulos/{{$articulo->url}}">{{$articulo->articulo}}</a></td>
                                            <td class="uk-text-center">$ {{$articulo->precio}}</td>
                                            <td class="uk-text-center">{{$articulo->stock}}</td>

                                            @if ($articulo->activo)
                                              <td><i class="material-icons uk-text-success md-24">&#xE834;</i></td>
                                            @else
                                              <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            @endif





                                            <td class="uk-text-nowrap">
                                                <a href="/articulos/{{$articulo->url}}/edit"><i class="material-icons md-24">&#xE8F4;</i> Editar</a>
                                            </td>
                                        </tr>
                                    @endforeach







                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>










@stop
