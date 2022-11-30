@extends('base.base')

@section('content')
<div class="container pt-3">
    <a class="btn btn-primary" href="{{ route('tareas.index') }}">Ir a Lista</a>
</div>
<div class="container d-flex justify-content-center">
    <form method="POST" action="{{ route('tareas.update',$tarea->id) }}">
      {{-- Actualiza un elemento en concreto de la tabla  --}}
      @method('PUT')
        @if (session()->has('success'))
            <div class="alert alert-primary" role="alert">
                {{ session()->get('success') }}
            </div> 
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input value="{{ @old('name') ?? $tarea->name }}" name="name" type="text" class="form-control" placeholder="Nombre de tarea">
            @error('name')
                <div class="form-text">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción:</label>
            <textarea name="description" cols="3" class="form-control" placeholder="Descripción de la tarea">{{ @old('descripcion') ?? $tarea->description }}</textarea>
            @error('description')
                <div class="form-text">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Fue Completada:</label>
            <select name="status" class="form-control">
                <option value="0" @if (!$tarea->status) selected @endif >No Completa</option>
                <option value="1" @if ($tarea->status) selected @endif >Completa</option>
            </select>
            @error('description')
                <div class="form-text">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input value="{{ @old('date') ?? $tarea->date }}" name="date" type="date" class="form-control">
            @error('date')
                <div class="form-text">{{ $message }} </div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection