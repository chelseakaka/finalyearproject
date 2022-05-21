@php
    $prefix = Request::route() -> getPrefix();
    $route = Route::current() -> getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>HR</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		<li class = " {{ ($route == 'dashboard')?'active':'' }} ">
          <a href="{{ route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        
        @if (Auth::user() -> role == 'Admin')
        <li class="treeview {{ ($prefix == '/user')?'active':'' }} ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=" {{ route('users.view')}}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
        @endif
		  
        @php
        $employee = DB::table('users') -> where('id', Auth::user() -> id) -> first();
        @endphp
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }} ">
            <a href="#">
              <i data-feather="mail"></i> <span>Manage Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a target = "_BLANK" href = "{{ route('employee.registration.details', $employee -> id)}}"> <i class="ti-more"></i> My Details </a></li>
              <li><a href="{{ route('password.view')}}"><i class="ti-more"></i>Change Passwprd</a></li>
            </ul>
          </li>		
          
        @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
        <li class="treeview {{ ($prefix == '/setups')?'active':'' }} ">
            <a href="#">
              <i data-feather="mail"></i> <span>Setup</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('employee.department.view')}}"><i class="ti-more"></i>Departments</a></li>
              <li><a href="{{ route('employee.designation.view')}}"><i class="ti-more"></i>Designations</a></li>
              <li><a href="{{ route('employee.shift.view')}}"><i class="ti-more"></i>Working Hours</a></li>
            </ul>
        </li>	
        @endif

        @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
        <li class="treeview {{ ($prefix == '/workers')?'active':'' }} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.registration.view')}}"><i class="ti-more"></i>View All Employees</a></li>
            <li><a href="{{ route('employee.registration.add')}}"><i class="ti-more"></i>Add Employee</a></li>
            {{-- <li><a href="{{ route('employee.salary.view')}}"><i class="ti-more"></i>Employee Salary</a></li>
            <li><a href="{{ route('employee.leave.myleave')}}"><i class="ti-more"></i>View My Leave</a></li>
            <li><a href="{{ route('employee.leave.status')}}"><i class="ti-more"></i>View All Employee Leave</a></li>
            <li><a href="{{ route('employee.leave.apply')}}"><i class="ti-more"></i>Apply Leave</a></li> --}}
          </ul>
        </li>	
        @endif

        @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
        <li class="treeview {{ ($prefix == '/salary')?'active':'' }} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Salary</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.salary.view')}}"><i class="ti-more"></i>Employee Salary</a></li>
          </ul>
        </li>	
        @endif

        <li class="treeview {{ ($prefix == '/leave')?'active':'' }} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Leave</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- <li><a href="{{ route('employee.registration.view')}}"><i class="ti-more"></i>View All Employees</a></li>
            <li><a href="{{ route('employee.registration.add')}}"><i class="ti-more"></i>Add Employee</a></li> --}}
            {{-- <li><a href="{{ route('employee.salary.view')}}"><i class="ti-more"></i>Employee Salary</a></li> --}}
            <li><a href="{{ route('employee.leave.myleave')}}"><i class="ti-more"></i>View My Leave</a></li>
            @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
            <li><a href="{{ route('employee.leave.status')}}"><i class="ti-more"></i>View All Employee Leave</a></li>
            @endif
            <li><a href="{{ route('employee.leave.apply')}}"><i class="ti-more"></i>Apply Leave</a></li>
          </ul>
        </li>	

        <li class="treeview {{ ($prefix == '/claim')?'active':'' }} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Claims</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.claim.myclaim')}}"><i class="ti-more"></i>View My Claims</a></li>
            @if (Auth::user() -> role == 'Admin' || Auth::user() -> role == 'HR')
            <li><a href="{{ route('employee.claim.status')}}"><i class="ti-more"></i>View All Employee Claims</a></li>
            @endif
            <li><a href="{{ route('employee.claim.apply')}}"><i class="ti-more"></i>Apply Claims</a></li>
          </ul>
        </li>	
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>