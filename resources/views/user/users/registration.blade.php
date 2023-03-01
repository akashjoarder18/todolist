<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Admin Panel  {{isset($title)?'| '.$title:''}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition" style="width:40%; margin:0 auto;background:#bcbcbc">
<div class="wrapper">
    <!-- Main row -->
    <div class="row">
    	<div class="container-fluid">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{$url}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name',$user->name ?? '')}}">
                    <span class="text-danger">
                      @error('name')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email',$user->email ?? '')}}">
                    <span class="text-danger">
                      @error('email')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="text-danger">
                      @error('password')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="">Gender</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="M" name="gender"
                          @isset($user) {{$user->gender == "M" ? "checked" : ""}} @endisset />
                          <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="F" name="gender" @isset($user) {{$user->gender == "F" ? "checked" : ""}} @endisset />
                          <label class="form-check-label">Female</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" value="O" name="gender" @isset($user) {{$user->gender == "O" ? "checked" : ""}} @endisset />
                          <label class="form-check-label">Other</label>
                        </div>
                        <span class="text-danger">
                          @error('gender')
                          {{$message}}
                          @enderror
                        </span>
                  </div>
                  <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter ..." >{{old('address',$user->address ?? '')}}</textarea>
                  </div> 
                <!-- /.card-body -->

                <div class="card-footer" style="padding: 0;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{route('getLogin')}}"><button type="button"  class="btn btn-info float-right">Cancel</button></a>
                </div>
                                               
              </div>
              </form>
            </div>
    	
    </div>
    <!-- /.row (main row) -->
  </div>