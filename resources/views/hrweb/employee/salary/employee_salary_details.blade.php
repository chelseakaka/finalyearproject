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
                <h4 class="box-title">Employee Salary Details</h4> 
                <h6> <strong> Employee Name : </strong> {{ $details -> name}} </h6> 
                <h6> <strong> Employee ID No : </strong> {{ $details -> id_no}} </h6> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width = "5%">SL</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>
                              <th>Present Salary</th>
                              <th>Effected Date</th>    
                              {{-- <th>Salary(RM)</th>
                              <th>Joined Date</th>
                              <th>Bank Account No</th>
                              <th>Marital Status</th>
                              <th>Reporting To</th> --}}
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($salary_log as $key => $log)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $log -> previous_salary }}</td>
                              <td>{{ $log -> increment_salary }}</td>
                              <td>{{ $log -> present_salary }}</td>
                              <td>{{ $log -> effected_salary }}</td>
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