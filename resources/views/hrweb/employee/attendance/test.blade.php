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
                <h4 class="box-title">Employee Attendance List</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.attendance.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Attendance </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        {{-- @if (Auth::user() -> role == 'Admin') --}}
                          <tr>
                              <th width = "5%">SL</th>
                              <th>Name</th>
                              <th>ID No</th>
                              <th>Date</th>
                              <th>Attendance Status</th>
                              <th width = "20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $attend)
                          {{-- @foreach($allData as $key => $leave) --}}
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $attend['user']['name'] }}</td>
                              <td>{{ $attend['user']['id_no'] }}</td>
                              <td>{{ date('d-m-Y', strtotime($attend -> date)) }}</td>
                              <td>{{ $attend -> attendance_status }}</td>
                              <td>  
                                    <a href = "{{ route('employee.leave.delete', $attend->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>  
                              </td>
                          </tr>
                          {{-- @endforeach --}}
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