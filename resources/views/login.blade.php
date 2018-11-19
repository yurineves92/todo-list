@extends('layout.main')

@section('content')
<br>
<div class="row">
	<div class="container-fluid">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">Acesso ao sistema</h2>
			<div>
			@if ($message = Session::get('alert-success'))
		      	<div class="alert alert-success alert-block">
		        	<button type="button" class="close" data-dismiss="alert">X</button> 
		            	<strong>{{ $message }}</strong>
		      	</div>
		    @elseif ($message = Session::get('alert-danger'))
		      	<div class="alert alert-danger alert-block">
		        	<button type="button" class="close" data-dismiss="alert">X</button> 
		            	<strong>{{ $message }}</strong>
		      	</div>
		    @elseif ($message = Session::get('alert-info'))
		      	<div class="alert alert-info alert-block">
		        	<button type="button" class="close" data-dismiss="alert">X</button> 
		            	<strong>{{ $message }}</strong>
		      	</div>
		    @endif
			<form method="POST" action="/authenticate">
      		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
	        	<label for="nome">Email</label>
	        	<input type="text" name="email" class="form-control" placeholder="Email...">
	        </div>
	        <div class="form-group">
	        	<label for="nome">Senha</label>
	        	<input type="password" name="password" class="form-control" placeholder="Senha...">
	        </div>
		    <div class="text-center">
		    	<button type="submit" class="btn btn-primary btn-block btn-flat">Acessar</button>
		    </div>
			</form>
	    </div>
	</div>
</div>
@endsection

