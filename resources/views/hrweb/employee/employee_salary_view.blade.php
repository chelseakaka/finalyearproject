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
                <h4 class="box-title">Salary List</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.registration.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Employee Salary</a>
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
                              <th>Join Date</th>
                              <th>Salary(RM)</th>      
                              {{-- <th>Salary(RM)</th>
                              <th>Joined Date</th>
                              <th>Bank Account No</th>
                              <th>Marital Status</th>
                              <th>Reporting To</th> --}}
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                            {{-- @if (Auth::user() -> role == 'Admin') --}}
                           
                              <th width = "">Action</th>
                              @endif
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $salary)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $salary -> name }}</td>
                              <td>{{ $salary -> id_no }}</td>
                              <td>{{ $salary -> email }}</td>
                              <td>{{ date('d-m-Y', strtotime($salary -> joineddate)) }}</td>
                              <td>{{ $salary -> salary }}</td>
                              @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                              <td> 
                                    <a title = "Increment" href = "{{ route('employee.salary.increment', $salary -> id) }}" class = "btn btn-info"> 
                                        <i class = "fa fa-plus-circle"> </i>
                                    </a> 
                                    <a title = "Details" target = "_BLANK" href = "{{ route('employee.salary.details', $salary -> id)}}" class = "btn btn-danger"> 
                                        <i class = "fa fa-eye"> </i>
                                    </a>       
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