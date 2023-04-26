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
        <h1>Permisos</h1>
        <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-outline-success mb-2"><i class="fa fa-plus"></i></a>
        <table id="permissions-table" class="table table-striped" width="100%">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <!-- <th>Tipo de rol</th>
                        <th>Cantidad de usuarios</th> -->
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="text-center">{{ $permission->id }}</td>
                        <td class="text-center">{{ $permission->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                class="btn btn-sm btn-outline-primary"><i class="fa fa-edit"></i></a>
                            </a>
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger delete-perm"
                                    data-id="{{ $permission->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            $('#permissions-table').DataTable({
                dom: 'lfrtip',
                "columnDefs": [{
                        "width": "33%",
                        "targets": 0 // set width for the first column
                    },
                    {
                        "width": "33%",
                        "targets": 1 // set width for the second column
                    },
                    {
                        "width": "33%",
                        "targets": 2 // set width for the third column
                    }
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },


            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.delete-perm', function(e) {
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
                        url: '/admin/permissions/' + id,
                        data: {
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: '¡Permiso eliminado correctamente!',
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
