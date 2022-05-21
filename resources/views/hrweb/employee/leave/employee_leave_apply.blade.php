@extends('layouts.hr.hr_master')
@section('hr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Apply For Leave</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                        @foreach($employees as $employee)
                            <form method = "POST" action = "{{ route('store.leave.application', $employee -> id) }}">
                        @endforeach
                        @csrf
                        <div class="row">
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h5> Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        {{-- <select name="employee_id" id = "employee_id" required = "" class="form-control"> --}}
                                            <input value = "{{ Auth::user() -> name }}" class="form-control" selected = "" disabled = ""> 
                                            {{-- @foreach($employees as $employee) --}}
                                            {{-- <input value = "{{ Auth::user() -> name }}" disabled>   --}}

                                            {{-- @endforeach --}}
                                        {{-- </select> --}}
                                    </div>
                                </div>
                            </div>
                            <div class = "col-md-6">
                                <div class="form-group">
                                    <h5> Start Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="start_date" class="form-control"> 
                                        </div>
                                </div>  
                            </div>
                            <div class="col-12">
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Leave Purpose <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="leave_purpose_id" id = "leave_purpose_id" required = "" class="form-control">
                                                    <option value="" selected = "" disabled = ""> Leave Purpose </option>
                                                    @foreach($leave_purpose as $leave)
                                                    <option value = {{ $leave -> id }}> {{ $leave -> name}} </option>
                                                    @endforeach
                                                    <option value = "0"> Other Purpose </option>
                                                </select>
                                                <input type = "text" name = "name" id = "add_another_purpose" class = "form-control" placeholder = "Write Purpose" style = "display : none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> End Date <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="end_date" class="form-control"> 
                                                </div>
                                        </div>  
                                    </div>
                                </div>                      
                            </div>
                        </div>     
                        <div class="text-xs-right">
                            <button type = "submit" class = "btn btn-rounded btn-info mb-5" value = "{{ $employee -> id }}" > Submit </button>
                        </div>
                        </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
    
    </div>
</div>

<script type = "text/javascript">
    $(document).ready(function(){
        $(document).on('change', '#leave_purpose_id', function(){
            var leave_purpose_id = $(this).val();
            if (leave_purpose_id == "0") {
                $('#add_another_purpose').show();
            }
            else{
                $('#add_another_purpose').hide();
            }
        });
    });
</script>

@endsection