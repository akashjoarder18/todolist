@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tasklists</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Tasklists</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
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
                <input type="hidden" name="todo_id" value="{{$todo_id}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Task Title</label>
                    <input type="text" class="form-control" id="name" name="task_title" placeholder="Enter title" value="{{old('task_title',$task->task_title ?? '')}}">
                    <span class="text-danger">
                      @error('task_title')
                      {{$message}}
                      @enderror
                    </span>
                  </div>
                  
                  <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" name="task_details" rows="3" placeholder="Enter ..." >{{old('task_details',$task->task_details ?? '')}}</textarea>
                  </div>                                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection