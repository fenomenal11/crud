@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Curso') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('docentes.update', $docente) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $curso->nombre) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">{{ __('Nombre') }}</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $curso->descripcion) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="docente_id">{{ __('ID Docente') }}</label>
                        <select class="form-control" id="docente_id" name="docente_id" required>
                            @foreach($docentes as $docente)
                                <option value="{{ $docente->id }}" {{ $docente->docente_id == $docente->id ? 'selected' : '' }}>
                                    {{ $docente->id }} - {{ $docente->persona_dni }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1" {{ $docente->estado ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$docente->estado ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection