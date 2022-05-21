@extends('layouts.admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-12">
            {{-- <div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Employee List (Basic Info)</h3>
				</div>
			</div> --}}
           <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title"> User List </h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('users.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add User </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width = "1%">SL</th>
                              <th width = "10%">Name</th>
                              <th width = "1%">Role</th>
                              <th>Email</th>
                              <th>Code</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allUser as $key => $user)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $user -> name}}</td>
                              <td>{{ $user -> role}}</td>
                              <td>{{ $user -> email}}</td>
                              <td>{{ $user -> code}}</td>
                              <td> <a href = "{{ route('users.edit', $user->id)}}" class = "btn btn-info"> Edit </a> 
                                   <a href = "{{ route('users.delete', $user->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>                 
                              </td>
                          </tr>
                          @endforeach
                                
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
</div>

@endsection