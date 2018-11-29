@extends('layout.main')
@section('content')

<section class="content">
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-default">
			<div class="row text-center">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3>Acesso ao Sistema</h3>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
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
			<div class="box-footer text-center">
				<small>Acessar o sistema é importante para criar suas tarefas</small>
			</div>
		</div>
	</div>
</section>
@stop

