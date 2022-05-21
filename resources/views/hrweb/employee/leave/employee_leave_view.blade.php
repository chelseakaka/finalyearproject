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
                <h4 class="box-title">Employee Leave</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.leave.apply')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Apply For Leave </a>
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
                              <th>Purpose</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Status</th>
                              <th width = "25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $leave)
                        @if (Auth::user() -> id == $leave -> employee_id)
                          {{-- @foreach($allData as $key => $leave) --}}
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $leave['user']['name'] }}</td>
                              <td>{{ $leave['user']['id_no'] }}</td>
                              <td>{{ $leave['purpose']['name'] }}</td>
                              <td>{{ $leave -> start_date }}</td>
                              <td>{{ $leave -> end_date }}</td>
                              <td>{{ $leave -> status }}</td>
                              <td>  
                                    <a href = "{{ route('employee.leave.delete', $leave->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>  
                              </td>
                          </tr>
                          {{-- @endforeach --}}
                          @endif
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