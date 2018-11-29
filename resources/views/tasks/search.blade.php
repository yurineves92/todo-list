{!!Form::open(array('url'=>'/tasks', 'method'=>'GET', 'autocomplete'=>'off'))!!}
<div class="form-group">
	<div class="col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
		 	<label>Data de Início:</label>
		 	<input type="date" name="date_initial" class="form-control" placeholder="Selecione...">
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-xs-12">
		<div class="form-group">
		 	<label>Data Final:</label>
		 	<input type="date" name="date_final" class="form-control" placeholder="Selecione...">
		</div>
	</div>
	<div class="col-lg-3 col-sm-4 col-xs-12">
		<div class="form-group">
		 	<label>Título</label>
		 	<input type="text" name="searchText" class="form-control" placeholder="Buscar...">
		</div>
	</div>
	<div class="col-lg-3 col-sm-4 col-xs-12">
		<div class="form-group">
		 	<label>Categoria</label>
		 	<select name="category_id" class="form-control" required="Selecione...">
	  			<option disabled selected>Selecione...</option>
				@foreach($categories as $c)
					<option value="{{$c->id}}">{{$c->description}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Buscar</button>
		<a href="/tasks" class="btn btn-default">Limpar</a>
	</div>
</div>

{{Form::close()}}