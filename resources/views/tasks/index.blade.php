@extends('base.base')
@section('title', 'Tareas Laravel')
@section('content')
<h1 class="text-center pt-5">CRUD de Tareas con Laravel</h1>
<div class="d-flex justify-content-center pt-5">
  {{-- Redirecciona un controlador --}}
  {{-- action="{{asset('/tarea_peticion')}}" --}}
  <form method="POST">
    {{-- Ayuda a que tu formularios no tenga una insercion SQL --}}
    @csrf
    {{-- El retorno del mensaje se guarda en una session y se puede llamar asi con
    la variable success colocada en el controller --}}
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
      {{ session()->get('success') }}
    </div>
    @endif
    <div class="mb-3">
      <label class="form-label">Nombre:</label>
      {{-- El metodo @old nos sirve para --}}
      <input value="{{ @old('name') }}" name="name" type="text" class="form-control" placeholder="Nombre de tarea">
      @error('name')
      {{-- Se puede modificar el enlace que te sale --}}
      <div class="form-text bg-danger text-white p-3">{{ $message }} </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Descripción:</label>
      <textarea name="description" cols="3" class="form-control"
        placeholder="Descripción de la tarea">{{ @old('description') }}</textarea>
      @error('description')
      <div class="form-text bg-danger text-white p-3">{{ $message }} </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Fecha:</label>
      <input value="{{ @old('date') }}" name="date" type="date" class="form-control">
      @error('date')
      <div class="form-text bg-danger text-white p-3">{{ $message }} </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>
<br>
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $key => $tarea)
                <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $tarea->name }}</td>
                <td>{{ $tarea->description }}</td>
                <td>{{ $tarea->date}}</td>
                <td>
                    <button class="btn {{ $tarea->status ? 'btn-success' : 'btn-danger' }} ">{{ $tarea->status ? 'Realizada' : 'No realizada' }}</button>
                </td>
                <td class="d-flex">
                    <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-warning">Editar</a>
                    <form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection