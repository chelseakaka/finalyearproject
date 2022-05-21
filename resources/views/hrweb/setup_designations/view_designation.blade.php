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
                <h4 class="box-title">Designation List</h4> 
                {{-- <h6 class="box-title">Click Edit to See More in Details</h6> --}}
                <a href = "{{ route('employee.designation.add')}}" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Add Designation </a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width = "5%">SL</th>
                              <th>Name</th>
                              <th width = "25%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($allData as $key => $designation)
                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $designation -> name }}</td>
                              <td> <a href = "{{ route('employee.designation.edit', $designation->id)}}" class = "btn btn-info"> Edit </a> 
                                   <a href = "{{ route('employee.designation.delete', $designation->id)}}" class = "btn btn-danger" id = "delete"> Delete </a>       
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