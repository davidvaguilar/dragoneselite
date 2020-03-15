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