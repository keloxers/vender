<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articulo;
use App\Clasificadoscategoria;

use Image;
use Storage;
use DB;


class ArticulosController extends Controller
{

  public function home(){

      $articulos = Articulo::where('activo', 1)
                       ->orderBy('created_at', 'desc')
                       ->paginate(20);
      $title = "Ultimos articulos agregados";
      return view('home', ['articulos' => $articulos, 'title' => $title]);

  }

    public function index()
    {
        //

        $articulos = Articulo::where('users_id', Auth::user()->id)
                         ->orderBy('created_at', 'desc')
                         ->paginate(20);


        $title = "Articulos";

        return view('articulos.index', ['articulos' => $articulos, 'title' => $title]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {


        return view('articulos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {



      $this->validate($request, [
              'articulo' => 'required|max:255',
          ]);





        //
        $destinationPath = "/uploads";

        $articulo = new Articulo;

        $articulo->users_id = Auth::user()->id;
        $articulo->clasificadoscategorias_id = $request->input('clasificadoscategorias_id');
        $articulo->articulo = $request->input('articulo');
        $articulo->descripcion = $request->input('descripcion', 'Sin descripcion');
        $articulo->precio = $request->input('precio', 'No ingresado');
        $articulo->activo = 1;
        $articulo->url = str_slug($articulo->articulo, "-") . "-" . str_random(4);

        if ($request->file('photo')->isValid())
        {

            $file = $request->file('photo');

            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/original/';
    				$destinationPath_big = public_path() . '/uploads/big/';
    				$destinationPath_crop = public_path() . '/uploads/crop/';

            $filenew = str_random(8). "." . $extension;

    				$upload_success = $file->move($destinationPath, $filename);

    	        if ($upload_success) {

    									// $image = Image::make($destinationPath . $filename)->resize(800, null, true)->save($destinationPath_big . $filename);
    									// $image = Image::make($destinationPath . $filename)->resize(640, null, true)->crop(400, 300, true)->save($destinationPath_crop . $filename);

    									// File::delete($destinationPath . $filename);

                      $img = Image::make($destinationPath . $filename);
                      $img = $img->resize(640, null, function ($constraint) {
                                    $constraint->aspectRatio();
                      });
                      $img = $img->save($destinationPath_big . $filenew);

                      $img = Image::make($destinationPath . $filename);
                      $img = $img->resize(200, null, function ($constraint) {
                                    $constraint->aspectRatio();
                      });
                      $img = $img->save($destinationPath_crop . $filenew);

                      // Storage::delete($destinationPath . $filename);

                      $articulo->url_foto = $filenew;
    	    }




        }








        $articulo->save();

        $articulos = Articulo::all();
        return view('articulos.index', ['articulos' => $articulos]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($url)
    {
        //

          $articulo = Articulo::where('url', $url)
                           ->first();
          if ($articulo) {

            $cargados = Articulo::where('users_id', $articulo->users_id)->get();
            $cargados = count($cargados);

            $cargados = Articulo::where('users_id', $articulo->users_id)
                                ->where('users_id', $articulo->users_id)
                                ->get();
            $cargados = count($cargados);

            return view('articulos.show', ['articulo' => $articulo, 'cargados' => $cargados]);
          }






    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($article)
    {


      $articulo = Articulo::where('users_id', Auth::user()->id)
                       ->where('url', $article)
                       ->first();

        if ($articulo) {
          return view('articulos.edit', ['articulo' => $articulo]);
        }

        return redirect('/');





    }




    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

            $this->validate($request, [
                    'articulo' => 'required|max:255',
                ]);

              //
              $destinationPath = "/uploads";

              $articulo = Articulo::find($id);

              $articulo->clasificadoscategorias_id = $request->input('clasificadoscategorias_id');
              $articulo->articulo = $request->input('articulo');
              $articulo->descripcion = $request->input('descripcion', 'Sin descripcion');
              $articulo->precio = $request->input('precio', 'No ingresado');
              $articulo->activo=0;

              if ($request->input('activo') == "on") {
                $articulo->activo=1;
              }

              // $articulo->activo = 1;
              // $articulo->url = str_slug($articulo->articulo, "-") . "-" . str_random(4);


              if ($request->input('sube_foto')=="si") {


                  if ($request->hasFile('photo')) {

                      $file = $request->file('photo');

                      $filename = $file->getClientOriginalName();
                      $extension = $file->getClientOriginalExtension();

                      $destinationPath = public_path() . '/uploads/original/';
              				$destinationPath_big = public_path() . '/uploads/big/';
              				$destinationPath_crop = public_path() . '/uploads/crop/';

                      $filenew = str_random(8). "." . $extension;

              				$upload_success = $file->move($destinationPath, $filename);

              	        if ($upload_success) {

              									// $image = Image::make($destinationPath . $filename)->resize(800, null, true)->save($destinationPath_big . $filename);
              									// $image = Image::make($destinationPath . $filename)->resize(640, null, true)->crop(400, 300, true)->save($destinationPath_crop . $filename);

              									// File::delete($destinationPath . $filename);

                                $img = Image::make($destinationPath . $filename);
                                $img = $img->resize(640, null, function ($constraint) {
                                              $constraint->aspectRatio();
                                });
                                $img = $img->save($destinationPath_big . $filenew);

                                $img = Image::make($destinationPath . $filename);
                                $img = $img->resize(200, null, function ($constraint) {
                                              $constraint->aspectRatio();
                                });
                                $img = $img->save($destinationPath_crop . $filenew);

                                // Storage::delete($destinationPath . $filename);

                                $articulo->url_foto = $filenew;
              	    }




                  }




            }




              $articulo->save();

              $articulos = Articulo::all();
              return view('articulos.index', ['articulos' => $articulos]);









    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $url
     * @return Response
     */
    public function showcaterogia($url)
    {

      $clasificadoscategoria = Clasificadoscategoria::where('url', $url)->first();

      $articulos = Articulo::where('activo', 1)
                       ->where('clasificadoscategorias_id', $clasificadoscategoria->id)
                       ->orderBy('created_at', 'desc')
                       ->paginate(20);



       $title = "Articulos en la categoria: " . $clasificadoscategoria->clasificadoscategoria;

       return view('home', ['articulos' => $articulos, 'title' => $title]);



    }


        /**
         * Search buscar
         *
         * @param post $text
         * @return Response
         */
        public function buscar(Request $request)
        {
            $texto = $request->input('texto');
            $articulos = Articulo::where('activo', 1)
                             ->where('articulo', 'like', '%' . $texto . '%')
                             ->orderBy('created_at', 'desc')
                             ->paginate(20);

            $title = "Buscando: ". $texto;

            return view('home', ['articulos' => $articulos, 'title' => $title]);

        }

        public function deleteimage($article)
        {


          $articulo = Articulo::where('users_id', Auth::user()->id)
                           ->where('url', $article)
                           ->first();

            if ($articulo) {

              $id = $articulo->id;

              DB::table('articulos')
                          ->where('id', $id)
                          ->update(['url_foto' => ""]);

            }

            return redirect('/articulos/' . $article . "/edit");


        }



}
