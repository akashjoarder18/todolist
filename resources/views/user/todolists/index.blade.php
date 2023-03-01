@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Todolists</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Todolists</li>
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
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Todo Lists Details</h3>
                <a href="{{route('todolists.create')}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Add </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>To-do Name</th>
                      <th style="width: 200px">Tasks View</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($todoLists as $todo)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$todo->name}}</td>
                      <td><a href="{{route('tasklists.view', ['id' => $todo->todo_id])}}"><button class="btn btn-primary">Associated tasks</button></a></td>
                      <td>                       
                        <a href="{{route('todolists.edit', ['id' => $todo->todo_id])}}"><button class="btn btn-primary">edit</button></a>
                        <a href="{{route('todolists.delete', ['id' => $todo->todo_id])}}"><button class="btn btn-danger">delete</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <div class="d-flex">
                  
                </div>
                </ul>
              </div>
            </div>
    	</div>
    	
    </div>
    <!-- /.row (main row) -->
@endsection