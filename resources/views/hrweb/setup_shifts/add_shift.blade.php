@extends('layouts.hr.hr_master')
@section('hr')

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Shift</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method = "POST" action = "{{ route('store.employee.shift') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5> Add Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"> 
                                        </div>
                                        @error('name')
                                        <span class  = "text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>                         
                            </div>
                        </div>     
                                
                               
                               
                           <div class="text-xs-right">
                               <input type = "submit" class = "btn btn-rounded btn-info mb-5" value = "Add">
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


@endsection