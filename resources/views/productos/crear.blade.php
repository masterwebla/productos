@extends('template')
@section('titulo','Crear Producto')

@section('contenido')
	<h2 class="text-center">Crear producto</h2>
	<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
		@csrf

		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="number" name="precio" id="precio" class="form-control" required="required">
		</div>
		<div class="form-group">
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="imgen">Imagen</label>
			<input type="file" name="imagen" id="imagen" class="form-control">
		</div>
		<div class="form-group">
			<label for="categoria_id">Categoria</label>
			<select name="categoria_id" id="categoria_id" class="form-control" required="required">
				@foreach($categorias as $categoria)
					<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<a class="btn btn-danger" href="{{ route('productos.index') }}">Cancelar</a>
			<button class="btn btn-success">Guardar <i class="fas fa-save"></i></button>
		</div>

	</form>

@endsection