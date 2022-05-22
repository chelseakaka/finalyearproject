@extends('layouts.employee.employee_master')
@section('employee')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Write Feedback</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                        @foreach($employees as $employee)
                            <form method = "POST" action = "{{ route('store.feedback', $employee -> id) }}">
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
                                            <h5> Write Feedback <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="feedback" class="form-control"> 
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
        $(document).on('change', '#claim_purpose_id', function(){
            var claim_purpose_id = $(this).val();
            if (claim_purpose_id == "0") {
                $('#add_another_purpose').show();
            }
            else{
                $('#add_another_purpose').hide();
            }
        });
    });
</script>

@endsection