@extends('layouts.hr.hr_master')
@section('hr')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Apply For Claim</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                        @foreach($employees as $employee)
                            <form method = "POST" action = "{{ route('store.claim.application', $employee -> id) }}">
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
                                    <h5> Claim Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="claim_date" class="form-control"> 
                                        </div>
                                </div>  
                            </div>
                            <div class="col-12">
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Claim Purpose <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="claim_purpose_id" id = "claim_purpose_id" required = "" class="form-control">
                                                    <option value="" selected = "" disabled = ""> Claim Purpose </option>
                                                    @foreach($claim_purpose as $claim)
                                                    <option value = {{ $claim -> id }}> {{ $claim -> name}} </option>
                                                    @endforeach
                                                    <option value = "0"> Other Purpose </option>
                                                </select>
                                                <input type = "text" name = "name" id = "add_another_purpose" class = "form-control" placeholder = "Write Purpose" style = "display : none">
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