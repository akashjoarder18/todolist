@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Associated tasklists</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Associated tasklists</li>
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
                <h3 class="card-title"><b>{{$todo->name}}</b> associated tasklists Details</h3>
                <a href="{{route('tasklists.create', ['id' => $todo->todo_id])}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> Add Associated Tasks </button>
                </a>
                <a href="{{route('todolists.index', ['id' => auth()->user()->id])}}">
                  <button class="btn btn-primary d-inline-block m-2 float-right"> To-do lists </button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Task Title</th>
                      <th>Task Details</th>
                      <th style="width: 200px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($taskLists as $task)
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$task->task_title}}</td>
                      <td>{{$task->task_details}}</td>
                      
                      <td>                       
                        <a href="{{route('tasklists.edit', ['id' => $task->task_id])}}"><button class="btn btn-primary">edit</button></a>
                        <a href="{{route('tasklists.delete', ['id' => $task->task_id])}}"><button class="btn btn-danger">delete</button></a>
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