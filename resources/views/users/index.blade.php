@extends('layout.main')
@section('content')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li class="active"><i class="fa fa-user"></i> Usuários</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
	<div class="row">
		<div class="box-header with-border">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>Lista de Usuários <a href="users/create"><button class="btn btn-primary">Novo</button></a></h3>
				@include('users.search')
			</div>
		</div>
	</div>
	
	<div class="box-body">
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
	     @endif
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>ID</th>
							<th>Nome</th>
							<th>Email</th>
							<th>Opções</th>
						</thead>
		               @foreach ($users as $u)
						<tr>
							<td>{{ $u->id}}</td>
							<td>{{ $u->name}}</td>
							<td>{{ $u->email}}</td>
							<td>
								<a href="" data-target="#modal-reset-{{$u->id}}" data-toggle="modal"><button class="btn btn-default"><i class="fa fa-key"></i></button></a>
								<a href="{{URL::action('UsersController@edit',$u->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
		                        <a href="" data-target="#modal-delete-{{$u->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
							</td>
						</tr>
						@include('users.modal')
						@endforeach
					</table>
				</div>
				<div class="text-center">
					{{ $users->appends($searchText)->links() }}
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
@stop