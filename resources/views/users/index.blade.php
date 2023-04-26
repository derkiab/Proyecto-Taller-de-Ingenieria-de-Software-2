@extends('layouts.app')

@section('css_before')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection


@section('content')
    <div class="container">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: '{{ session('
                                success ') }}',
                    timer: 3000
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('
                                error ') }}'
                });
            </script>
        @endif
        <h1>Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"></i></a>
        <table id="users-table" class=" table-striped table" width="100%">
            <thead>
                <tr>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Visto por ultima vez</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->run }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->role }}
                        </td>
                        <td class="text-center">
                            @if (Cache::has('is_online' . $user->id))
                                <span class="text-success">En linea</span>
                            @else
                                <span class="text-secondary">Desconectado</span>
                            @endif
                        </td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($user->last_seen)->format('Y-m-d H') }}hrs</td>
                        <td>
                            <div class="container d-flex justify-content-center">
                                <img src="/imagen/{{ $user->image }}" width="10%">
                            </div>

                        </td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary"><i
                                    class="fa fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger delete-user"
                                    data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection


@section('js_after')
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                dom: 'lfrtip',

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },


            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-user', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            console.log(' kdñsñskd');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/admin/users/' + id,
                        data: {
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: '¡Usuario eliminado correctamente!',
                                timer: 1000
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 1000); // delay for half a second
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
