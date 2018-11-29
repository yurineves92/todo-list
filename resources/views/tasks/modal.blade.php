<!-- delete task -->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$t->id}}">
	{{Form::Open(array('action'=>array('TasksController@destroy',$t->id),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Apagar tarefa</h4>
			</div>
			<div class="modal-body">
				<p>Confirme se deseja apagar a tarefa: #{{$t->id}} <br> Título: {{$t->title}}</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>
<!-- finished task -->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-finished-{{$t->id}}">
	{{Form::Open(array('action'=>array('TasksController@finished',$t->id),'method'=>'post'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Finalizar a tarefa?</h4>
			</div>
			<div class="modal-body">
				<p>#{{$t->id}} - {{$t->title}}</p>
				<input type="date" name="ended" class="form-control" value="{{$t->ended}}">
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-primary">Sim</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
			</div><br>
		</div>
	</div>
	{{Form::Close()}}
</div>

<!-- view task -->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-view-{{$t->id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{{$t->title}}</h4>
                <small>Criado em {{ date('d/m/Y', strtotime($t->created_at)) }}</small>
			</div>
			<div class="modal-body">
				<p>{{$t->content}}</p>
			</div>
			<div class="text-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			</div><br>
		</div>
	</div>
</div>