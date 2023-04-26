@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="run" class="col-md-4 col-form-label text-md-right">{{ __('Run') }}</label>

                            <div class="col-md-6">
                                <input placeholder="11111111-1" id="run" type="text" class="form-control @error('run') is-invalid @enderror" name="run" value="{{ $user->run }}" required autocomplete="run" autofocus>

                                @error('run')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select class="form-control" id="role" @error('role') is-invalid @enderror" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}"
                                        {{-- @if($role->role_type==$current_role)
                                            selected='selected'
                                        @endif --}}
                                        >{{ $role }}</option>
                                    @endforeach
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- PARA VISUALIZAR LA IMAGEN -->
                        <div class="form-group row mb-3">
                            <img src="/imagen/{{ $user->image}}" id="imagenSeleccionada" style="max-height: 300px;">
                        </div>
                        <!-- input img -->
                        <div class="form-group row mb-3">
                            <input name="image" id="image" type="file">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a type="button" class="btn btn-sm btn-outline-danger" href="{{ route('users.index')}}">
                                    {{ __('Cancelar') }}
                                </a>
                                <button type="submit" class="ms-2 btn btn-sm btn-outline-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
