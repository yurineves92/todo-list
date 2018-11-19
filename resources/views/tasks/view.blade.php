@extends('layout.main')

@section('content')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="/tasks"><i class="fa fa-clone"></i> Tarefas</a></li>
	  <li class="active"><i class="fa fa-plus"></i> Visualização</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
		<div class="row">
			<div class="box-header with-border">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<h3>{{$task->title}}</h3>
					<hr>
				</div>
			</div>
		</div>
		<div class="box-body">

		</div>
	</div>
</section>
@endsection