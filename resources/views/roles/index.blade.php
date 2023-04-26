@extends('layouts.app')
@section('css_before')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

    <div class="container">

        <h1>Roles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"></i></a>
        <table id="roles-table" class="table table-striped" width="100%">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Tipo de rol</th>
                    <th class="text-center">Cantidad de usuarios</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ $role->id }}</td>
                        <td class="text-center">{{ $role->name }}</td>
                        <td class="text-center">{{ $role->role_type }}</td>
                        <td class="text-center">{{ $role->role_count }}</td>
                        <td class="text-center">
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger delete-role"
                                    data-id="{{ $role->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Exito',
                    text: '{{ session('success') }}',
                    timer: 3000
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}'
                });
            </script>
        @endif
@endsection

@section('js_after')
    <script src='https://code.jquery.com/jquery-3.5.1.js'></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>




    <script>
        $(document).ready(function() {
            $('#roles-table').DataTable({
                dom: 'lfrtip',

                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },


            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-role', function(e) {
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
                        url: '/admin/roles/' + id,
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

