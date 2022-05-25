@extends('layouts.admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add New User</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method = "POST" action = "{{ route('users.store') }}" enctype = "multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-12">
                                
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role" id="role" required = "" class="form-control">
                                                    <option value="" selected = "" disabled = ""> Select Role </option>
                                                    <option value = "Admin"> Admin </option>
                                                    <option value = "HR"> HR </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required"> </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Profile Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id = "image"> </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id = "showImage" src = "{{ url('upload/no_image.jpg') }}" style = "width : 100px; height : 100px; border : 1px solid black;">
                                            </div>
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

<script type = "text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection