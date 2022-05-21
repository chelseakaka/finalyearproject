@extends('layouts.hr.hr_master')
@section('hr')

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Shift</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method = "POST" action = "{{ route('update.employee.shift', $editData -> id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h5> Edit Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value = " {{ $editData -> name }} "> 
                                        </div>
                                        @error('name')
                                        <span class  = "text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>                         
                            </div>
                        </div>     
                                
                               
                               
                           <div class="text-xs-right">
                               <input type = "submit" class = "btn btn-rounded btn-info mb-5" value = "Update">
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