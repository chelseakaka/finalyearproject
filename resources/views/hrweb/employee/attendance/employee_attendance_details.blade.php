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
                <h4 class="box-title">Employee Attendance Details</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
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
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($details as $key => $attend)
                            {{-- @foreach($allData as $key => $leave) --}}
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $attend['user']['name'] }}</td>
                                <td>{{ $attend['user']['id_no'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($attend -> date)) }}</td>
                                <td>{{ $attend -> attendance_status }}</td>
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