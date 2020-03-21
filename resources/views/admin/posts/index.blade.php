@extends('admin.layout')

@section('header')
    <h1>
        Posts
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Posts</li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de publicaciones</h3>
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Crear publicacion
            </button>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <table id="posts-table" class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Fecha de publicación</th>      
                        <th>Extracto</th>                        
                        <th>Tipo</th>                      
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr> 
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if ($post->published_at)
                                    {{ $post->published_at->diffForHumans() }}
                                @endif
                            </td>
                            <td>{{ $post->excerpt }}</td>                            
                            <td>{{ $post->category->name }}</td>
                            <td>
                                @foreach( $post->tags as $tag)	
								    #{{ $tag->name }}
							    @endforeach
                            </td>
                            <td>
                                @can('view', $post)
                                    <a href="{{ route('posts.show', $post) }}" 
                                        target="_blank" 
                                        class="btn btn-xs btn-default"
                                    ><i class="fa fa-eye"></i></a>
                                @endcan
                                @can('update', $post)
                                    <a href="{{ route('admin.posts.edit', $post) }}" 
                                        class="btn btn-xs btn-info"
                                    ><i class="fa fa-pencil"></i></a>
                                @endcan
                                @can('delete', $post)
                                    <form method="POST" 
                                        action="{{ route('admin.posts.destroy', $post) }}" 
                                        style="display: inline">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" 
                                            onclick="return confirm('¿Estas seguro de querer eliminar esta publicación?')"
                                            class="btn btn-xs btn-danger"
                                        ><i class="fa fa-times"></i></button>
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