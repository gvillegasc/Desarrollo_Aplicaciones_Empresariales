@extends('app')

@section('content')
@if(Session::has('error'))
	<div class="alert alert-danger">
			<strong>Whoops!</strong>Al parecer algo esta mal joven <br><br>
			{{Session::get('error')}}
	</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar Sesion</div>
				<div class="panel-body">
					@if(count($erros) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Al parecer algo esta mal.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>

						</div>
					@endif
					@if (Session::has('csrf'))
						<div class="alert alert-danger">
							<strong>Whoops</strong> Al parecer algo esta mal. <br><br>
							{{Session::get('csrf')}}
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
