@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Cursos') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Lista de Cursos') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-4">{{ __('Agregar Curso') }}</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>ID Docente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursos as $curso)
    <tr>
        <td>{{ $curso->id }}</td>
        <td>{{ $curso->nombre }}</td>
        <td>{{ $curso->descripcion }}</td>
        <td>{{ $curso->docente_id }}</td>
        <td>{{ $curso->estado ? 'Activo' : 'Inactivo' }}</td>
        <td>
            <a href="{{ route('cursos.edit', $curso->docente_id) }}" class="btn btn-warning">{{ __('Editar') }}</a>
            <form action="{{ route('cursos.destroy', $curso->docente_id) }}" method="POST" style="display:inline-block;">
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
                <a href="{{ route('docentes.create') }}" class="btn btn-primary">{{ __('Agregar Curso') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>ID Docente</th>
                            <th>Estado</th>                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->nombre }}</td>
                                <td>{{ $curso->descripcion }}</td>
                                <td>{{ $curso->docente_id }}</td>
                                <td>{{ $curso->estado }}</td>
                                <td>
                                    <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;">
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
