@extends('user.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Users</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">Users Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <!--<th style="width: 10px">#</th>-->
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Status</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <!--<td>1.</td>-->
                      <td>{{$users->name}}</td>
                      <td>{{$users->email}}</td>
                      <td>
                          @if($users->gender == "M")
                            Male
                          @elseif($users->gender == "F")
                            Female
                          @else
                            Other
                          @endif
                      </td>
                      <td>{{$users->address}}</td>
                      <td>
                          @if($users->status == "1")
                           <span class="badge badge-success"> active </span>
                          @else
                          <span class="badge badge-danger"> inactive </span>
                          @endif</td>
                      <td>                       
                        <a href="{{route('users.edit', ['id' => $users->id])}}"><button class="btn btn-primary">edit</button></a>
                      </td>
                    </tr>
                    
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