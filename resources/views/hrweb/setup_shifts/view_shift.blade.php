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
                <h4 class="box-title">Shift List</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.shift.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Shift </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width = "5%">SL</th>
                              <th>Name</th>
                              {{-- <th width = "1%">Role</th>
                              <th>Email</th>
                              <th width = "1%">Gender</th> --}}
                              {{-- <th>Phone Number</th> --}}
                              {{-- <th>Date of Birth</th> --}}
                              {{-- <th>Address</th>
                              <th>Nationality</th> --}}
                              {{-- <th>Salary(RM)</th> --}}
                              {{-- <th>Joined Date</th> --}}
                              {{-- <th>Bank Account No</th> --}}
                              {{-- <th>Marital Status</th> --}}
                              {{-- <th>Reporting To</th> --}}
                              <th width = "25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $shift)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $shift -> name }}</td>
                              <td> <a href = "{{ route('employee.shift.edit', $shift->id)}}" class = "btn btn-info"> Edit </a> 
                                   <a href = "{{ route('employee.shift.delete', $shift->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>       
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