@extends('layout.main')
@section('content')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="/tasks"><i class="fa fa-clone"></i> Tarefas</a></li>
	  <li class="active"><i class="fa fa-plus"></i> Formulário</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="row">
			<div class="box-header with-border">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>Formulário</h3>
					<hr>
				</div>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">X</button>
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
						</ul>
					</div>
					@endif

					{!!Form::open(array('url'=>'tasks','method'=>'POST','autocomplete'=>'off'))!!}
		            {{Form::token()}}
		            <div class="form-group">
		            	<label for="nome">Titulo</label>
		            	<input type="text" name="title" class="form-control" placeholder="Título...">
		            </div>
		            <div class="form-group">
		            	<label for="nome">Categoria</label>
		            	<select name="category_id" class="form-control" required="Selecione...">
                  			<option disabled selected>Selecione...</option>
	            			@foreach($categories as $c)
	            				<option value="{{$c->id}}">{{$c->description}}</option>
	            			@endforeach
            		</select>
		            </div>
		            <div class="form-group">
		            	<label for="nome">Conteúdo</label>
		            	<textarea name="content" class="form-control" rows="4" cols="70" placeholder="Digite contéudo da tarefa..."></textarea>
		            </div>
		            <div class="form-inline">
		            	<label for="nome">Início</label>
		            	<input type="date" name="started" class="form-control">
		            	<label for="nome">Finalizado</label>
		            	<input type="date" name="ended" class="form-control">
		            </div><br>
		            <div class="form-group">
		            	<label for="nome">Status</label>
		            	<input type="checkbox" name="status" value="0">Aberto
		            	<input type="checkbox" name="status" value="1">Finalizado
		            </div>
		            <div class="form-group">
		            	<button class="btn btn-primary" type="submit">Salvar</button>
		            	<a href="/tasks" class="btn btn-default">Cancelar</a>
		            </div>
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
</section>
@stop