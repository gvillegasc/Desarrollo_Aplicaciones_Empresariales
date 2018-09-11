<?php namespace GestorImagenes\Http\Controllers\Validacion;

use GestorImagenes\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Http\Request;

class ValidacionController extends Controller {

		protected $auth;
		protected $registrar;

		public function __construct(Guard $auth, Registrar $registrar)
		{
			$this->auth = $auth;
			$this->registrar = $registrar;

			$this->middleware('guest', ['except' => 'getLogout']);
		}

		public function getRegistro()
		{
			return 'formulario creacion cuenta';
		}

		/**
		 * Handle a registration request for the application.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function postRegistro(Request $request)
		{
			$validator = $this->registrar->validator($request->all());

			if ($validator->fails())
			{
				$this->throwValidationException(
					$request, $validator
				);
			}

			$this->auth->login($this->registrar->create($request->all()));

			return redirect($this->redirectPath());
		}

		/**
		 * Show the application login form.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getInicio()
		{
			return 'Mostrando formulario inicio sesion';
		}

		/**
		 * Handle a login request to the application.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function postInicio(Request $request)
		{
			$this->validate($request, [
				'email' => 'required|email', 'password' => 'required',
			]);

			$credentials = $request->only('email', 'password');

			if ($this->auth->attempt($credentials, $request->has('remember')))
			{
				return redirect()->intended($this->redirectPath());
			}

			return redirect($this->loginPath())
						->withInput($request->only('email', 'remember'))
						->withErrors([
							'email' => $this->getFailedLoginMessage(),
						]);
		}

		/**
		 * Get the failed login message.
		 *
		 * @return string
		 */
		protected function getFailedLoginMessage()
		{
			return 'Email o contraseña incorrectos.';
		}

		/**
		 * Log the user out of the application.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function getSalida()
		{
			$this->auth->logout();

			return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
		}

		/**
		 * Get the post register / login redirect path.
		 *
		 * @return string
		 */
		public function redirectPath()
		{
			if (property_exists($this, 'redirectPath'))
			{
				return $this->redirectPath;
			}

			return property_exists($this, 'redirectTo') ? $this->redirectTo : '/inicio';
		}

		/**
		 * Get the path to the login route.
		 *
		 * @return string
		 */
		public function loginPath()
		{
			return property_exists($this, 'loginPath') ? $this->loginPath : '/validacion/inicio';
		}

		public function getRecuperar()
		{
			return 'recuperar contraseña';
		}

		public function postRecuperar()
		{
				return 'recuperando contraseña';
		}


	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */


	public function missingMethod($parameters=array())
	{
		abort(404);
	}

}
