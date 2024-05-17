@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Agregar Curso') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('docentes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="docente_id">{{ __('ID Docente') }}</label>
                        <select class="form-control" id="docente_id" name="docente_id" required>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->id }} - {{ $docente->persona_dni }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">{{ __('Estado') }}</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1">{{ __('Activo') }}</option>
                            <option value="0">{{ __('Inactivo') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Agregar Cursoo') }}</button>

                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection