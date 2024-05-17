@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Estudiantes') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lista de Estudiantes') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-4">{{ __('Agregar Estudiante') }}</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $estudiante)
    <tr>
        <td>{{ $estudiante->id }}</td>
        <td>{{ $estudiante->persona_dni }}</td>
        <td>{{ $estudiante->estado ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('estudiantes.edit', $estudiante->persona_dni) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <form action="{{ route('estudiantes.destroy', $estudiante->persona_dni) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{ __('Eliminar') }}</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('docentes.create') }}" class="btn btn-primary">{{ __('Agregar Estudiante') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Persona DNI</th>
                            <th>Estado</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->id }}</td>
                                <td>{{ $estudiante->persona_dni }}</td>
                                <td>{{ $estudiante->estado }}</td>
                                <td>
                                    <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
