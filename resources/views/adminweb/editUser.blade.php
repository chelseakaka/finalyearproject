@extends('layouts.admin.admin_master')
@section('admin')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

<div class="content-wrapper">
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit User</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method = "POST" action = "{{ route('users.update', $editUsers -> id) }}" enctype = "multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-12">
                                
                                <div class = "row">
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value = {{ $editUsers -> name }}> </div>
                                        </div>
                                    </div>
                                    <div class = "col-md-6">
                                        <div class="form-group">
                                            <h5> Role <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role" id="select" required class="form-control">
                                                    <option value="" selected = "" disabled = ""> Select Role </option>
                                                    <option value = "Admin" {{ ($editUsers -> role == "Admin" ? "selected": "")}}> Admin </option>
                                                    <option value = "HR" {{ ($editUsers -> role == "HR" ? "selected": "")}}> HR </option>
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
                                                <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" value = {{ $editUsers -> email }}> </div>
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

{{-- <script type = "text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script> --}}

@endsection