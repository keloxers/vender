@extends('layouts.default')
@section('content')


{!! Form::open(array('url' => '/perfil/' . $user->id , 'method' => 'post')) !!}
<div id="page_content_inner">


  @if (count($errors) > 0)
              @foreach ($errors->all() as $error)

                  <div class="uk-alert uk-alert-danger" data-uk-alert>
                      <a href="#" class="uk-alert-close uk-close"></a>
                      {{ $error }}
                  </div>


              @endforeach
  @endif

  <div class="md-card">

        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-10-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_menu" data-uk-dropdown>
                            <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                            <div class="uk-dropdown uk-dropdown-flip uk-dropdown-small">
                                <ul class="uk-nav">
                                    <li><a href="/">Ver publicaciones</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="user_heading_avatar">
                            <span class="user_action_icon"><i class="material-icons md-48 md-light">&#xE7FD;</i></span>
                        </div>
                        <div class="user_heading_content">
                            <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">Usuario: {{Auth::user()->email}}</span></h2>
                            <ul class="user_stats">
                                <li>
                                    <h4 class="heading_a"> <span class="sub-heading">Publicados</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a"> <span class="sub-heading">Cancelados</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a"> <span class="sub-heading">Vendidos</span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



  </div>

    <div class="md-card">

      <div class="md-card">
          <div class="md-card-toolbar">
              <h3 class="md-card-toolbar-heading-text">
                  Datos de contacto
              </h3>
          </div>
          <div class="md-card-content">
              <ul>
                  <li>
                      <div class="md-list-content">
                          <span class="uk-text-small uk-text-muted uk-display-block">Nombre</span>
                          <input type="text" class="md-input" value='{!! $user->name !!}' id="name" name="name"/>
                      </div>
                  </li>

                  <li>
                      <div class="md-list-content">
                          <span class="uk-text-small uk-text-muted uk-display-block">Telefono</span>
                          <input type="text" class="md-input" value='{!! $user->telefono !!}' id="telefono" name="telefono"/>
                      </div>
                  </li>
                  <li>
                      <div class="md-list-content">
                          <span class="uk-text-small uk-text-muted uk-display-block">Facebook</span>
                          <input type="text" class="md-input" value='{!! $user->facebook !!}' id="facebook" name="facebook"/>
                      </div>
                  </li>
                  <li>
                      <div class="md-list-content">
                          <span class="uk-text-small uk-text-muted uk-display-block">Twitter</span>
                          <input type="text" class="md-input" value='{!! $user->twitter !!}' id="twitter" name="twitter"/>
                      </div>
                  </li>
              </ul>
          </div>
      </div>




        <div class="md-card-content">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-1-4 uk-width-medium-1-2">
                      <button type="submit" class="md-btn md-btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

{!! Form::close() !!}


@stop
