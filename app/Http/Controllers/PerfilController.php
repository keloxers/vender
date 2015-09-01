<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Articulo;
use App\User;


class PerfilController extends Controller
{



    public function index()
    {
        //
    }

    public function login()
    {
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {

        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        return view('users.edit', ['user' => $user]);


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

        $user = User::find($id);
        if ($user) {
          $user->name = $request->input('name','');
          $user->telefono = $request->input('telefono','');
          $user->facebook = $request->input('facebook','');
          $user->twitter = $request->input('twitter','');
          $user->save();
        }

        return redirect('/');

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

    public function ayuda()
    {

        return view('layouts.ayuda');

    }

    public function showuser($user)
    {

      $u = User::where('activo', 1)
              ->where('name', $user)
              ->first();
      if (count($u)) {

        $articulos = Articulo::where('activo', 1)
                         ->orderBy('created_at', 'desc')
                         ->paginate(20);
        $title = "Articulos del vendedor: " . $u->name;
        return view('home', ['articulos' => $articulos, 'title' => $title]);

      }
      echo "No se encontro el usuario";
      return;


    }



}
