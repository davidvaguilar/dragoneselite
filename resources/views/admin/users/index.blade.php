@extends('admin.layout')

@section('header')
    <h1>
        Usuarios
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Usuarios</li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de usuarios</h3>
            @can('create', $users->first())
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Crear usuario
                </a>
            @endcan
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Run</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Roles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr> 
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->run }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach( $user->tags as $tag)	
								    #{{ $tag->name }}
							    @endforeach
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td><a href="https://api.whatsapp.com/send?phone=56{{ $user->movil }}" target="_blank">{{ $user->movil }}</a></td>       
                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                            <td>
                            @can('view', $user)
                                <a href="{{ route('admin.users.show', $user) }}" 
                                    class="btn btn-xs btn-default">
                                        <i class="fa fa-eye"></i>
                                </a>
                            @endcan
                            @can('update', $user)
                                <a href="{{ route('admin.users.edit', $user) }}" 
                                    class="btn btn-xs btn-info">
                                        <i class="fa fa-pencil"></i>
                                </a>
                            @endcan
                            @can('delete', $user)
                                <form method="POST" 
                                    action="{{ route('admin.users.destroy', $user) }}" 
                                    style="display: inline">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" 
                                        onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')"
                                        class="btn btn-xs btn-danger">
                                            <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            })

        })

       
    </script>

@endpush