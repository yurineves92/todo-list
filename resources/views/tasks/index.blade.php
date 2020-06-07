@extends('layout.main')
@section('content')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li class="active"><i class="fa fa-send"></i> Tarefas</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
	<div class="row">
		<div class="box-header with-border">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>Lista de Tarefas <a href="tasks/create"><button class="btn btn-primary">Novo</button></a></h3>
				@include('tasks.search')
			</div>

		</div>
	</div>
	
	<div class="box-body">
		<small>Escolha as situações da tarefas</small>
		<div>
			<a href="/tasks"><button class="btn btn-default">Todas</button></a>
			<a href="/tasks/0"><button class="btn btn-primary">Abertas</button></a>
			<a href="/tasks/1"><button class="btn btn-success">Finalizadas</button></a>
		</div>
		<br>
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
							<th>Título</th>
							<th>Início</th>
							<th>Finalizado</th>
							<th>Status</th>
							<th>Categoria</th>
							<th>Usuário</th>
							<th>Opções</th>
						</thead>
		               	@foreach ($tasks as $t)
						<tr>
							<td>{{ $t->id}}</td>
							<td>{{ $t->title}}</td>
							<td>{{ date('d/m/Y', strtotime($t->started)) }}</td>
							@if(!empty($t->ended))
							<td>{{ date('d/m/Y', strtotime($t->ended)) }}</td>
							@else
							<td></td>
							@endif
							@if($t->status == 1)
							<td>Finalizado</td>
							@else
							<td>Aberto</td>
							@endif
							<td>{{ $t->category->description}}</td>
							<td>{{ $t->user->name}}</td>
							<td>
								<a href="{{URL::action('TasksController@edit',$t->id)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
		                        <a href="" data-target="#modal-delete-{{$t->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
		                        @if($t->status == 0)
		                        <a href="" data-target="#modal-finished-{{$t->id}}" data-toggle="modal"><button class="btn btn-primary"><i class="fa fa-retweet"></i></button></a>
		                        @endif
							</td>
						</tr>
						@include('tasks.modal')
						@endforeach
					</table>
				</div>
			</div>
			<div class="text-center">
				{{ $tasks->appends($searchText)->links() }}
			</div>
		</div>
	</div>
	</div>
</section>
@stop