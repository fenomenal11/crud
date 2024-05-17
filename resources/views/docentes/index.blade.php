@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Docentes') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lista de Docentes') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-4">{{ __('Agregar Docente') }}</a>
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
                @foreach ($docentes as $docente)
    <tr>
        <td>{{ $docente->id }}</td>
        <td>{{ $docente->persona_dni }}</td>
        <td>{{ $docente->estado ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('docentes.edit', $docente->persona_dni) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <form action="{{ route('docentes.destroy', $docente->persona_dni) }}" method="POST" style="display:inline-block;">
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
                <a href="{{ route('docentes.create') }}" class="btn btn-primary">{{ __('Agregar Docente') }}</a>
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
                        @foreach ($docentes as $docente)
                            <tr>
                                <td>{{ $docente->id }}</td>
                                <td>{{ $docente->persona_dni }}</td>
                                <td>{{ $docente->estado }}</td>
                                <td>
                                    <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('docentes.destroy', $docente) }}" method="POST" style="display:inline;">
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
