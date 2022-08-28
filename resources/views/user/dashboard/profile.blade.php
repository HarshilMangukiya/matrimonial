@extends('user.layouts.main')
@section('title', $data['title'])
@section('content')



                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profile
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->




                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome to Vekaria !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="{{ Auth::user()->avatar}}" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</h5>
                                                <p class="text-muted mb-0 text-truncate">{{getUserType(Auth::user()->type)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>
                                        <a onclick="return editFormElement()" type="button" id="btnEdit"><i class="bx bx-edit-alt font-size-20 ms-2"></i></a>
                                        <p class="text-muted mb-4"></p>
                                        <form  id="formUserProfile" action="{{route('user.profile.save')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

                                        @csrf
                                    
                                    <div class="row">  
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="user_first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="user_first_name" name="user_first_name"
                                                    placeholder="First name" value="{{Auth::user()->first_name}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="user_last_name" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="user_last_name" name="user_last_name"
                                                    placeholder="Last name" value="{{Auth::user()->last_name}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="user_username" name="user_username"
                                                    placeholder="Username" value="{{Auth::user()->username}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">  
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="user_email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="user_email" name="user_email"
                                                    placeholder="Email" value="{{Auth::user()->email}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="user_mobile" class="form-label">Mobile</label>
                                                <input type="text" class="form-control" id="user_mobile" name="user_mobile"
                                                    placeholder="Mobile" value="{{Auth::user()->mobile}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-type-input" class="form-label">Type</label>
                                                    <select id="user_type" name="user_type" class="form-select" value="{{Auth::user()->type}}">
                                                        <option value="0">Super Admin</option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Master</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="formrow-status-input" class="form-label">Status</label>
                                                    <select id="user_status" name="user_status" class="form-select" value="{{Auth::user()->status}}">
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                        <label for="user_mobile" class="form-label">Profile Image</label>
                                            <input type="file" class="form-control" id="user_avatar" name="user_avatar">
                                        </div>
                                    </div>

                                </div>

                                     <button type="submit" id="btnSaveProfile" class="btn btn-primary">Save</button>
                                 </form>
                                    </div>
                                </div>
                                <!-- end card -->


                                <!-- end card -->
                            </div>


                        </div>
                        <!-- end row -->




                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->






@endsection('content')
@section('custom-scripts')
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.form.js') }}"></script>
<script type="text/javascript">


    $(document).ready(function(){
        readOnlyFormElement();
    });
    
    function readOnlyFormElement(){
        $("#user_username").prop('readonly',true);
        $("#user_first_name").prop('readonly',true);
        $("#user_last_name").prop('readonly',true);
        $("#user_email").prop('readonly',true);
        $("#user_mobile").prop('readonly',true);
        $("#user_avatar").prop('readonly',true)
        $("#user_type").prop('disabled',true);
        $("#user_status").prop('disabled',true);
        $("#btnSaveProfile").hide();
        $("#btnEdit").show();
    }
    
    function editFormElement(){
        $("#user_first_name").prop('readonly',false);
        $("#user_last_name").prop('readonly',false);
        $("#user_email").prop('readonly',false);
        $("#user_mobile").prop('readonly',false);
        $("#user_avatar").prop('readonly',false);
        $("#btnSaveProfile").show();
        $("#btnEdit").hide()
    }



$(document).ready(function() {
    var options = {
        beforeSubmit: showRequest, // pre-submit callback
        success: showResponse // post-submit callback
    };
    // bind form using 'ajaxForm'
    $('#formUserProfile').ajaxForm(options);
});

function showRequest(formData, jqForm, options) {
    var queryString = $.param(formData);
    return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form) {


    if (responseText['status'] == 1) {
        toastr["success"](responseText['msg']);
        readOnlyFormElement();

    } else if (responseText['status'] == 0) {
        if(typeof responseText['data'] !== "undefined"){
            var size = Object.keys(responseText['data']).length;
            if(size>0){
                for (var [key, value] of Object.entries(responseText['data'])) {
                  toastr["error"](value);
               }
            }
         }else{
            toastr["error"](responseText['msg']);
         }
    }
}
        </script>
@endsection