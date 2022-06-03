@extends('layouts.hr.hr_master')
@section('hr')

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
                <h4 class="box-title">Employee List</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.registration.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Employee </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width = "5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Email</th>
                              <th>Gender</th>
                              <th>Join Date</th>
                              <th>Salary(RM)</th>
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <th>Code</th>
                              @endif
                              <th>Image</th>
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <th width = "20%">Action</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $employee)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $employee -> name }}</td>
                              <td>{{ $employee -> id_no }}</td>
                              <td>{{ $employee -> email }}</td>
                              <td>{{ $employee -> gender }}</td>
                              <td>{{ date('d-m-Y', strtotime($employee -> joineddate)) }}</td>
                              <td>{{ $employee -> salary }}</td>
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <td>{{ $employee -> code }}</td>
                              @endif
                              <td><img id = "showImage" src = "{{ (!empty( $employee -> image))? url('upload/employee_images/'.$employee -> image):url('upload/no_image.jpg') }}" style = "width : 100px; height : 100px; border : 1px solid black;"></td>
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <td> <a href = "{{ route('employee.registration.edit', $employee -> id) }}" class = "btn btn-info"> Edit </a> 
                                   <a target = "_BLANK" href = "{{ route('employee.registration.details', $employee -> id)}}" class = "btn btn-info"> Details </a>   
                                   <a href = "{{ route('employee.registration.delete', $employee -> id) }}" class = "btn btn-danger" id = "delete"> Delete </a>     
                              </td>
                              @endif
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