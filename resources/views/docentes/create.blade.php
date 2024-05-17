@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Agregar Docente') }}</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('docentes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="persona_dni">{{ __('DNI de Persona') }}</label>
                        <select class="form-control" id="persona_dni" name="persona_dni" required>
                            @foreach ($personas as $persona)
                                <option value="{{ $persona->dni }}">{{ $persona->dni }} - {{ $persona->nombres }} {{ $persona->apellido_paterno }}</option>
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
                    <button type="submit" class="btn btn-primary">{{ __('Agregar Docente') }}</button>

                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        {{ __('Registrar Nueva Persona') }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Registrar Nueva Persona') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Aquí va el contenido del formulario para registrar una nueva persona -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                                    <button type="button" class="btn btn-primary">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection