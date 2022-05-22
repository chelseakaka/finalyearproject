<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Employee Management System - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    {{-- Toastr --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    {{-- Sweet Alert --}}
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
    <div class="wrapper">

        {{-- Header --}}
        @if (Auth::user() -> role == 'Admin')
        @include('layouts.admin.admin_header')

        @elseif (Auth::user() -> role == 'HR')
        @include('layouts.hr.hr_header')

        @else
        @include('layouts.employee.employee_header')

        @endif
      
        {{-- Sidebar --}}
        @if (Auth::user() -> role == 'Admin')
        @include('layouts.admin.admin_sidebar')

        @elseif (Auth::user() -> role == 'HR')
        @include('layouts.hr.hr_sidebar')

        @else
        @include('layouts.employee.employee_sidebar')

        @endif
        
        {{-- Content(Middle) --}}
        @yield('admin')
    
        {{-- Footer --}}
        <style>
          .main-footer {
              position: fixed;
              padding: 10px 30px 0px 10px;
              bottom: 0;
              width: 100%;
          }
        </style>
        @if (Auth::user() -> role == 'Admin')
        @include('layouts.admin.admin_footer')

        @elseif (Auth::user() -> role == 'HR')
        @include('layouts.hr.hr_footer')

        @else
        @include('layouts.employee.employee_footer')

        @endif
      
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      
    </div>
<!-- ./wrapper -->
  	
	<!-- Vendor JS -->
	  <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	  <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	  <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
	  <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

  {{-- Handlebars --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"> </script>

    <script type = "text/javascript">
        $(function(){
          $(document).on('click', '#delete', function(d){
            d.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "You Want To Delete This Data?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
              )}
            })
          });
        });
    </script>

	{{-- Toastr --}}
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
    }
    @endif 
    </script>

</body>
</html>
