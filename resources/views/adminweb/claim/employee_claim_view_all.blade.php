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
                <h4 class="box-title">Employee Claim</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.claim.apply')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Apply For Claim </a>
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
                              <th>Claim Date</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($trash as $key => $claim)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $claim['user']['name'] }}</td>
                              <td>{{ $claim['user']['id_no'] }}</td>
                              <td>{{ $claim['purpose']['name'] }}</td>
                              <td>{{ $claim -> claim_date }}</td>
                              <td>
                                @if ($claim -> status == 'Successful')
                                Approve
                                @elseif ($claim -> status == 'Unsuccessful')
                                Declined
                                @elseif ($claim -> status == 'Ongoing')
                              <form action = "{{ route('employee.approve_claim', $claim->id)}}" method="POST" >
                                @csrf
                                <button type="submit" value="{{$claim->id}}" name="employee_id" class = "btn btn-rounded btn-info mb-5">Approve</button>
                              </form>
                              <form action = "{{ route('employee.decline_claim', $claim->id)}}" method="POST" >
                                @csrf
                                <button type="submit" value="{{$claim->id}}" name="employee_id" class = "btn btn-rounded btn-info mb-5">Decline</button>
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