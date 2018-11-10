<?php namespace GestorImagenes\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use GestorImagenes\Http\Requests\CrearAlbumRequest;
use GestorImagenes\Album;

class AlbumController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
  public function getIndex()
	{
		$usuario=Auth::user();
		$albumes=$usuario->albumes;
		return view('albumes.mostrar',['albumes'=>$albumes]);
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
  public function getCrearAlbum()
  {
    return view('albumes.crear-album');
  }

  public function postCrearAlbum(CrearAlbumRequest $request)
  {
    $usuario=Auth::user();
		Album::create
		(
				[
						'nombre'=>$request->get('nombre'),
						'descripcion'=>$request->get('descripcion'),
						'usuario_id'=>$usuario->id,
				]
		);
		return redirect('/validado/albumes')->with('creado','El album ha sido creado');
  }

  public function getActualizarAlbum()
  {
    return ('formulario de actualizar albumes');
  }

  public function postActualizarAlbum()
	{
		return ('actualizar Album');
	}

  public function getEliminarAlbum()
	{
		return ('formulario de eliminar Albumes');
	}

  public function postEliminarAlbum()
  {
    return ('eliminando Album');
  }

	public function missingMethod($parameters=array())
	{
		abort(404);
	}

}
