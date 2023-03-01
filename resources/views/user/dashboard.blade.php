@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
    		Welcome To Dashboard
    	</div>
      <div class="card" style="margin: 0 auto;">
        <div class="card-header">
          <h3 class="card-title">Create To-do lists</h3>
        </div>
        <div class="card-body">
          <a href="{{route('todolists.index', ['id' => auth()->user()->id])}}">
            <button class="btn btn-primary d-inline-block m-2 float-right"> To-do lists </button>
          </a>
        </div>
      </div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection