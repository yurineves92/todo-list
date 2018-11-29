@extends('layout.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content row">
  <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Totais</h3>
        </div>
        <div class="box-body table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Abertas</th>
                <th>Fechadas</th>
                <th>Totais</th>
            </thead>
            <tbody>
              <td>{{$task_open}}</td>
              <td>{{$task_close}}</td>
              <td>{{$task_open + $task_close}}</td>
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <div class="col-md-6">
      <div class="box">
    	  <div class="box-header with-border">
          <h3 class="box-title">Últimas tarefas adicionadas</h3>
        </div>
        <div class="box-body">
          <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
               	<th>ID</th>
        				<th>Título</th>
                <th>Status</th>
        				<th>Categoria</th>
        				<th>Ações</th>
            </thead>
            <tbody>
            @foreach ($tasks as $t)
            <tr>
              <td>{{ $t->id}}</td>
              <td>{{ $t->title}}</td>
              @if($t->status == 1)
              <td>Finalizado</td>
              @else
              <td>Aberto</td>
              @endif
              <td>{{ $t->category->description}}</td>
              <td>
               <a href="" data-target="#modal-view-{{$t->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a>
              </td>
            </tr>
            @include('tasks.modal')
            @endforeach
            </tbody>
          </table>
          </div>
        </div>
      </div>
  </div>
</section>
<script src="/js/chart.min.js"></script>

@endsection