@extends('admin.layout')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Datos personales</h3>
      </div>
      <div class="box-body">

        @include('partials.error-messages')

        <form method="POST" action="{{ route('admin.users.store') }}">
          {{ csrf_field() }}
          <div class="form-group col-md-6">
            <label for="run">Run:</label>
            <input name="run" value="{{ old('run') }}" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="name">Nombre:</label>
            <input name="name" value="{{ old('name') }}" class="form-control">
          </div>
          <div class="form-group col-md-12">
            <label for="email">Email:</label>
            <input name="email" value="{{ old('email') }}" class="form-control">
          </div>

          <div class="form-group col-md-12">
            <label for="adress">Domicilio:</label>
            <input name="adress" value="{{ old('adress') }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label for="phone">Telefono:</label>
            <input name="phone" value="{{ old('phone') }}" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="movil">Celular:</label>
            <input name="movil" value="{{ old('movil') }}" class="form-control">
          </div>

          <div class="form-group col-md-12 {{ $errors->has('tags') ? 'has-error' : '' }}">
              <label>Categorias :</label>  <!--var_dump(old('tags'))-->
              <select name="tags[]" class="form-control select2" 
                      multiple="multiple" 
                      data-placeholder="Seleccione una o mas etiquetas" 
                      style="width: 100%;">
                  @foreach ($tags as $tag)
                      <option {{ collect(old('tags', $user->tags->pluck('id') ))->contains($tag->id) ? 'selected' : '' }} 
                              value="{{ $tag->id }}"
                          >{{ $tag->name }}</option>
                  @endforeach
              </select>                        
              {!! $errors->first('tags', '<span class="help-block">:message</span>' ) !!}  
          </div>

          <div class="form-group col-md-6"> 
              <label>Roles</label>
              @include('admin.roles.checkboxes')
          </div>
          <div class="form-group col-md-6"> 
              <label>Permisos</label>
              @include('admin.permissions.checkboxes', ['model' => $user])
          </div>
          <span class="help-block">La contraseña será generada y enviada al nuevo usuario via email</span>
          <button class="btn btn-primary btn-block">Crear usuario</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $('.select2').select2({
           // tags: false
        });

    </script>
@endpush