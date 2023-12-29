@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить пользователя
        <small>приятные слова..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{Form::open([
      'route' => ['users.update', $user->id],
      'method' => 'put',
      'files' => true
      ])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inputName">Имя</label>
              <input type="text" name="name" class="form-control" id="inputName"
              placeholder="" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="inputEmail1">E-mail</label>
              <input type="email" name="email" class="form-control" id="inputEmail1" 
              placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="inputPassword">Пароль</label>
              <input type="password" name="password" class="form-control" id="inputPassword" 
              placeholder="">
            </div>
            <div class="form-group">
              <img src="{{$user->getAvatar()}}" alt="" width="200" class="img-responsive">
              <label for="inputFile">Аватар</label>
              <input type="file" name="avatar" id="inputFile">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection