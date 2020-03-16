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

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <div class="form-group col-md-6">
            <label for="run">Run:</label>
            <input name="run" value="{{ old('run', $user->run) }}" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="name">Nombre:</label>
            <input name="name" value="{{ old('name', $user->name) }}" class="form-control">
          </div>

          <div class="form-group col-md-12">
            <label for="email">Email:</label>
            <input name="email" value="{{ old('email', $user->email) }}" class="form-control">
          </div>

          <div class="form-group col-md-12">
            <label for="adress">Domicilio:</label>
            <input name="adress" value="{{ old('adress', $user->adress) }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label for="phone">Telefono:</label>
            <input name="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="movil">Celular:</label>
            <input name="movil" value="{{ old('movil', $user->movil) }}" class="form-control">
          </div>

          <div class="form-group col-md-6">
            <label for="password">Contraseña:</label>
            <input name="password" type="password" placeholder="Contraseña" class="form-control">
            <span class="help-block">Dejar en blanco para no cambiar la contraseña.</span>
          </div>
          <div class="form-group col-md-6">
            <label for="password_confirmation">Repite la Contraseña:</label>
            <input name="password_confirmation" type="password" placeholder="Repite la contraseña" class="form-control">
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

          <button class="btn btn-primary btn-block">Actualizar usuario</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Roles</h3>
      </div>
      <div class="box-body">
        @role('Admin')
          <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('admin.roles.checkboxes')

            <button type="submit" class="btn btn-primary btn-block">Actualizar roles</button>
          </form>
        @else
          <ul class="list-group">
            @forelse ($user->roles as $role)
              <li class="list-group-item">{{ $role->name }}</li>
            @empty
              <li class="list-group-item">No tiene roles</li>
            @endforelse
          </ul>
        @endrole
      </div>
    </div>
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Permisos</h3>
      </div>
      <div class="box-body">
        @role('Admin')
          <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('admin.permissions.checkboxes', ['model' => $user])
            
            <button type="submit" class="btn btn-primary btn-block">Actualizar permisos</button>
          </form>
        @else
          <ul class="list-group">
            @forelse ($user->permissions as $permission)
              <li class="list-group-item">{{ $permission->name }}</li>
            @empty
              <li class="list-group-item">No tiene permisos</li>
            @endforelse
          </ul>
        @endrole
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