@extends('layouts.hr.hr_master')
@section('hr')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
          <div class="col-12">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue" style="background: url('../images/gallery/full/black.png') center center;">
                  <h3 class="widget-user-username" style = "text-align:center;">{{ $user['employee']}}</h3>
                  {{-- <h6 class="widget-user-desc" style = "text-align:center;">{{ $user -> role}}</h6> --}}
                  @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
                  {{-- <a href = "" style = "float:right;" class = "btn btn-rounded btn-success mb-5"> Edit Profile </a> --}}
                  {{-- {{ route('profile.edit')}} --}}
                  @endif
                  <h3 class="widget-user-desc">Role : {{ $user->role }}</h3>
	                <h3 class="widget-user-desc">Email : {{ $user->email }}</h3>
                </div>
                <div class="widget-user-image">
                  <img class="rounded-circle" src="{{ (!empty( $user -> image))? url('upload/employee_images/'.$user -> image):url('upload/no_image.jpg') }}" alt="User Avatar">
                </div>
                @if (Auth::user() -> role == 'Employee')
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Email</h5>
                        <span class="description-text">{{ $user -> email}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 br-1 bl-1">
                      <div class="description-block">
                        <h5 class="description-header">Address</h5>
                        <span class="description-text">{{ $user -> address}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Phone Number</h5>
                        <span class="description-text">{{ $user -> phonenumber}}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Gender</h5>
                          <span class="description-text">{{ $user -> gender}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 br-1 bl-1">
                        <div class="description-block">
                          <h5 class="description-header">Date of Birth</h5>
                          <span class="description-text">{{ $user -> dob}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Nationality</h5>
                          <span class="description-text">{{ $user -> nationality}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Salary</h5>
                          <span class="description-text">{{ $user -> salary}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 br-1 bl-1">
                        <div class="description-block">
                          <h5 class="description-header">Joined Date</h5>
                          <span class="description-text">{{ $user -> joineddate}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Bank Account Number</h5>
                          <span class="description-text">{{ $user -> bankaccount}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Marital Status</h5>
                          <span class="description-text">{{ $user -> maritalstatus}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      {{-- <div class="col-sm-4 br-1 bl-1">
                        <div class="description-block">
                          <h5 class="description-header">Working Hours</h5>
                          <span class="description-text">{{ $user['Employee_shift']['name']}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div> --}}
                      <!-- /.col -->
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>


                  {{-- REMOVE THIS LATER --}}
                  {{-- <div class="box-footer">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">Department</h5>
                          <span class="description-text">{{ $user['employee_department']['department_id']}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 br-1 bl-1">
                        <div class="description-block">
                          <h5 class="description-header">Reporting To</h5>
                          <span class="description-text">{{ $user -> reportingto}}</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div> --}}
              </div>
              @endif
            
             
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
</div>

@endsection

