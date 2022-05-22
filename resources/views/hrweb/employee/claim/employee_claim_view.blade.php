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
                <h4 class="box-title">Employee Claim</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.claim.apply')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Apply For Claim </a>
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
                              <th>Claim Date</th>
                              <th>Amount Claimed</th>
                              <th>Status</th>
                              <th width = "25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($allData as $key => $claim)
                        @if (Auth::user() -> id == $claim -> employee_id)
                          {{-- @foreach($allData as $key => $claim) --}}
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $claim['user']['name'] }}</td>
                              <td>{{ $claim['user']['id_no'] }}</td>
                              <td>{{ $claim['purpose']['name'] }}</td>
                              <td>{{ $claim -> claim_date }}</td>
                              <td>{{ $claim -> claim_amount }}</td>
                              <td>{{ $claim -> status }}</td>
                              <td>  
                                    <a href = "{{ route('employee.claim.delete', $claim->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>  
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