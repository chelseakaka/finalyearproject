@extends('layouts.employee.employee_master')
@section('employee')

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
                <h4 class="box-title">Employee Feedback</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                {{-- <a href = "{{ route('employee.registration.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Employee </a> --}}
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
                              <th>Feedback</th>
                              {{-- <th>Gender</th>
                              <th>Date of Birth</th>
                              <th>Join Date</th> --}}
                              {{-- <th>Salary(RM)</th> --}}
                              {{-- @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <th>Code</th>
                              @endif --}}
                              {{-- <th>Image</th> --}}
                              {{-- <th>Salary(RM)</th>
                              <th>Joined Date</th>
                              <th>Bank Account No</th>
                              <th>Marital Status</th>
                              <th>Reporting To</th> --}}
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <th width = "20%">Action</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $employee)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $employee['Employee']['name'] }}</td>
                              <td>{{ $employee['Employee']['id_no'] }}</td>
                              <td>{{ $employee -> feedback }}</td>
                              {{-- <td>{{ $employee -> gender }}</td>
                              <td>{{ $employee -> dob }}</td> --}}
                              {{-- <td>{{ date('d-m-Y', strtotime($employee -> joineddate)) }}</td> --}}
                              {{-- <td>{{ $employee -> salary }}</td> --}}
                              {{-- @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <td>{{ $employee -> code }}</td>
                              @endif --}}
                              {{-- <td><img id = "showImage" src = "{{ (!empty( $employee -> image))? url('upload/employee_images/'.$employee -> image):url('upload/no_image.jpg') }}" style = "width : 100px; height : 100px; border : 1px solid black;"></td> --}}
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <td> 
                                   <a href = "{{ route('employee.feedback.delete', $employee -> id) }}" class = "btn btn-danger" id = "delete"> Delete </a>     
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