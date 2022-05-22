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
                <h4 class="box-title">Employee Leave</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.leave.apply')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Apply For Leave </a>
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
                              <th>Purpose</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th width = "25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $leave)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $leave['user']['name'] }}</td>
                              <td>{{ $leave['user']['id_no'] }}</td>
                              <td>{{ $leave['purpose']['name'] }}</td>
                              <td>{{ $leave -> start_date }}</td>
                              <td>{{ $leave -> end_date }}</td>
                              <td>
                                @if ($leave -> status == 'Approved')
                                Approve
                                @elseif ($leave -> status == 'Unsuccessful')
                                Declined
                                @elseif ($leave -> status == 'Pending')
                              <form action = "{{ route('employee.approve_leave', $leave->id)}}" method="POST" >
                                @csrf
                                <button type="submit" value="{{$leave->id}}" name="employee_id" class = "btn btn-rounded btn-info mb-5" id = "approve">Approve</button>
                              </form>
                              <form action = "{{ route('employee.decline_leave', $leave->id)}}" method="POST" >
                                @csrf
                                <button onclick = "Are you sure you want to delete?" type="submit" value="{{$leave->id}}" name="employee_id" class = "btn btn-rounded btn-info mb-5" id = "decline">Decline</button>
                              </form>
                              @endif
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