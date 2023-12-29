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
      
      <!-- Default box -->
      <div class="box">
      {{Form::open(['route' => 'users.store', 'files' => true])}}
        <div class="box-header with-border">
          <h3 class="box-title">Добавляем пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="userName">Имя</label>
              <input type="text" name="name" class="form-control" value="{{old('name')}}" id="userName" placeholder="">
            </div>
            <div class="form-group">
              <label for="inputEmail1">E-mail</label>
              <input type="text" name="email" class="form-control" value="{{old('email')}}" id="inputEmail1" placeholder="">
            </div>
            <div class="form-group">
              <label for="inputPassword">Пароль</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="">
            </div>
            <div class="form-group">
              <label for="inputFile">Аватар</label>
              <input type="file" name="avatar" id="inputFile">

              <p class="help-block">Какое-нибудь уведомление о форматах..</p>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection