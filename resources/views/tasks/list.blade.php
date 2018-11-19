@extends('layout.main')

@section('content')
<div class="row">
	<div class="blog-header">
		<h2 class="blog-title">Listas de tarefas</h2>
	</div>
	<div class="col-sm-12 blog-main">
		@foreach($tasks as $task)
		<h4>{{$task->title}}</h4>
		<div>
			Criado em: {{$task->started}}
		</div>
		<div>
			<p>
				{{$task->content}}
			</p>
		</div>
		<div>
			@if($task->status == 1)
			<p class="alert alert-success">Finalizado</p>
			@else
			<p class="alert alert-danger">Aberto</p>
			@endif
		</div>
		<a href="{{URL::action('TasksController@view',$task->id)}}"><button class="btn btn-primary"><i class="fa fa-search"></i> Visualizar</button></a>
		
		<hr>
		@endforeach
		<div class="text-center">
			{{$tasks->render()}}	
		</div>
	</div>
</div>
@endsection
