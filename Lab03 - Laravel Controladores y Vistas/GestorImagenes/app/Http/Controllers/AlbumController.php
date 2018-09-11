<?php namespace GestorImagenes\Http\Controllers;

class AlbumController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
		return ('mostrando Albumes del usuario');
	}
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
  public function getCrearAlbum()
  {
    return ('formulario de actualizar Albumes');
  }

  public function postCrearAlbum()
  {
    return ('almacenando Album');
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
