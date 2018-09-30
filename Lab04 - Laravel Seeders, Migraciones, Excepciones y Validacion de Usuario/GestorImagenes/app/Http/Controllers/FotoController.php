<?php namespace GestorImagenes\Http\Controllers;

use GestorImagenes\Album;
use GestorImagenes\Foto;
use GestorImagenes\Http\Request\MostrarFotosRequest;

class FotoController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex(MostrarFotosRequest $request)
	{
		$id = $request->get('id');
		$album = Album::find($id);
		$fotos = $album->fotos;
		return view('fotos.mostrar',['fotos'=>$fotos]);
	}

  public function getCrearFoto()
  {
    return 'formulario de crear foto';
  }

  public function postCrearFoto()
  {
    return 'almacenando foto';
  }

  public function getActualizarFoto()
  {
    return 'formulario de actualizar fotos';
  }

  public function postActualizarFoto()
	{
		return 'actualizar foto';
	}

  public function getEliminarFoto()
	{
		return 'formulario de eliminar fotos';
	}

  public function postEliminarFoto()
  {
    return 'eliminando foto';
  }

	public function missingMethod($parameters=array())
	{
		abort(404);
	}

}
