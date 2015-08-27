@extends('layouts.default')
@section('content')

{!! Form::open(array('route' => 'articulos.store', 'method' => 'post', 'files' => true)) !!}
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
        <div class="md-card-content">
            <h3 class="heading_a">Cargar nuevo articulo</h3><br>

            <div class="md-card-content">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">

                  <div class="uk-form-row">
                    <h3 class="heading_a">Seleccione una categoria</h3>
                        <div class="uk-width-medium-1-2">
                            <select id="clasificadoscategorias_id" name="clasificadoscategorias_id" data-md-selectize>
                                <option value="">Seleccionar</option>

                                <?php
                                        $clasificadoscategorias = App\Clasificadoscategoria::where('activo', 1)
                                                         ->orderBy('clasificadoscategoria')
                                                         ->get();
                                ?>

                                @foreach ($clasificadoscategorias as $clasificadoscategoria)
                                  <option value="{{$clasificadoscategoria->id}}">{{$clasificadoscategoria->clasificadoscategoria}}</option>
                                @endforeach




                            </select>
                        </div>
                  </div>

                    <div class="uk-form-row">
                        <label>Articulo</label>
                        <input type="text" class="md-input" id="articulo" name="articulo"/>
                    </div>
                    <div class="uk-form-row">
                      <label>Descripcion</label>
                      <textarea cols="30" rows="7" class="md-input" id="descripcion" name="descripcion"></textarea>
                    </div>


                </div>

                <div class="uk-width-medium-1-2">

                  <div class="uk-form-row">
                    <div class="uk-width-large-1-4 uk-width-medium-1-2">
                        <div class="uk-input-group">
                            <label>Stock</label>
                            <input type="text" class="md-input" id="stock" name="stock"/>
                        </div>
                    </div>
                  </div>


                    <div class="uk-form-row">
                      <h3 class="heading_a">
                              Foto
                          </h3>
                          <div class="uk-grid">
                              <div class="uk-width-1-1">
                                  <div class="uk-form-file md-btn md-btn-primary">
                                      Buscar
                                      <input id="photo" type="file" name="photo">
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                    <div class="uk-input-group">
                        <span class="uk-input-group-addon">$</span>
                        <label>Precio</label>
                        <input type="text" class="md-input" id="precio" name="precio"/>
                    </div>
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-1-4 uk-width-medium-1-2">
                  <button type="submit" class="md-btn md-btn-primary">Enviar</button>
              </div>
            </div>

        </div>

    </div>


</div>

{!! Form::close() !!}

@stop
