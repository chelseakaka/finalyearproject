@extends('layouts.hr.hr_master')
@section('hr')

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Attendance</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method = "POST" action = "{{ route('store.employee.attendance') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5> Attendance Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date" class="form-control" value = "{{ $editData['0']['date'] }}"> 
                                        </div>
                                </div>                         
                            </div>
                        </div>  
                        
                        <div class = "row">
                            <div class = "col-md-12">
                                <table class = "table table-bordered table striped" style = "width : 100%">
                                    <thead>
                                        <tr>
                                            <th rowspan = "2" class ="text-center" style = "vertical-align: middle;"> SL </th>
                                            <th rowspan = "2" class ="text-center" style = "vertical-align: middle;"> Employee List </th>
                                            <th colspan = "3" class ="text-center" style = "vertical-align: middle; width : 30%"> Attendance Status </th>				
                                        </tr>
                                        <tr>
                                            <th class = "text-center btn present_all" style = "display : table-cell; background-color : #000000"> Present </th>
                                            <th class = "text-center btn leave_all" style = "display : table-cell; background-color : #000000"> On Leave </th>
                                            <th class = "text-center btn leave_all" style = "display : table-cell; background-color : #000000"> Unpaid Leave </th>
                                        </tr>   				
                                    </thead>
                                    <tbody>
                                        @foreach($editData as $key => $data)
                                        <tr id = "div{{ $data -> id }}" class = "text-center">
                                            <input type = "hidden" name = "employee_id[]" value = "{{ $data -> employee_id }}">
                                            <td> {{ $key+1 }} </td>
                                            <td> {{ $data['user']['name'] }} </td>
                                            <td colspan = "3"> 
                                                <div class = "switch-toggle switch-3 switch-candy">
                                                    <input name = "attendance_status{{$key}}" type = "radio" value = "Present" id = "present{{$key}}" checked = "checked" {{ ($data->attendance_status == 'Present')?'checked' : '' }} >
                                                        <label for = "present{{$key}}"> Present </label>                                           
                                                    <input name = "attendance_status{{$key}}" type = "radio" value = "On Leave" id = "leave{{$key}}" {{ ($data->attendance_status == 'On Leave')?'checked' : '' }} >
                                                        <label for = "leave{{$key}}"> On Leave </label>
                                                    <input name = "attendance_status{{$key}}" type = "radio" value = "Unpaid Leave" id = "unpaid{{$key}}" {{ ($data->attendance_status == 'Unpaid Leave')?'checked' : '' }} >
                                                        <label for = "unpaid{{$key}}"> Unpaid Leave </label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach                                   
                                    </tbody>
                                </table>
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