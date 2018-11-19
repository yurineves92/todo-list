@extends('layout.main')

@section('content')
<div class="row">

    <div class="blog-header">
      <h2 class="blog-title">Listas de tarefas</h2>
        <p class="lead blog-description">Últimas tarefas adicionadas</p>
    </div>

	<div class="col-sm-9 blog-main">
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
	<div class="col-sm-3 blog-sidebar">
	    <div class="sidebar-module sidebar-module-inset">
	      <h4>Yuri Neves</h4>
	      <p>Desenvolvedor PHP/Angular</p>
	    </div>
	    <div class="sidebar-module">
	        <h4>Situações</h4>
	        <ol class="list-unstyled">
		        <li><a href="/">Todas</a></li>
		        <li><a href="/tasks/list/0">Abertas</a></li>
		        <li><a href="/tasks/list/1">Finalizadas</a></li>
	    	</ol>
	    </div>
	    <div class="sidebar-module">
	        <h4>Categorias</h4>
	        @foreach($categories as $category)
	        <li><a href="tasks/category/{{$category->id}}">{{$category->description}}</a></li>
	        @endforeach
	    </div>
	    <div class="sidebar-module">
	        <h4>Rede Sociais</h4>
	        <ol class="list-unstyled">
	          <li><a href="https://github.com/yurineves92">GitHub</a></li>	
	          <li><a href="https://www.facebook.com/yuri.neves92">Facebook</a></li>
	        </ol>
	    </div>
	</div>
</div>
@endsection