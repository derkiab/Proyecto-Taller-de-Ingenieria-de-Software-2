@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar rol</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.update', $role->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="role_type" class="col-md-4 col-form-label text-md-right">Tipo de rol</label>

                            <div class="col-md-6">
                                <select class="form-control" id="role_type" @error('role_type') is-invalid @enderror" name="role_type">
                                    <option value="1"
                                    @if($role->role_type==1)
                                        selected='selected'
                                    @endif>Admin</option>
                                    <option value="2"
                                    @if($role->role_type==2)
                                        selected='selected'
                                    @endif>Analista</option>
                                    <option value="3"
                                    @if($role->role_type==3)
                                        selected='selected'
                                    @endif>Trabajador</option>
                                </select>
                                @error('role_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    Editar
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