@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Create To-do lists</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Create To-do lists</li>
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
                <div class="card-body">
                  <div class="form-group">
                    <label  for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name',$todo->name ?? '')}}">
                    <span class="text-danger">
                      @error('name')
                      {{$message}}
                      @enderror
                    </span>
                    
                  </div>
                  @if($flag==1)
                  <div class="float-right">
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Associated Tasks</button>
                  </div>
                  @endif
                                                  
                </div>
                @if($flag==1)
                <div class="card-body" >
                  @if(session('validation_error'))
                    <div class="text-danger text-center mb-3">{{session('validation_error')}}</div>
    	            @endif
                  <table class="table table-bordered" id="dynamicAddRemove">
                  </table>
                </div>
                <!-- /.card-body -->
                @endif
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection