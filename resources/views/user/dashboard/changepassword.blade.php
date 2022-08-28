@extends('user.layouts.main')
@section('title', $data['title'])
@section('content')



                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Change Password</h4>


                                </div>


                            </div>
                        </div>
                        <!-- end page title -->





                        <div class="row" id="non-prime-div" >
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">





                                     <form id="formPassword" class="custom-validation" action="{{route('do.change.password')}}" method="POST" enctype="multipart/form-data" >

                                              @csrf


                                        <div class="mb-3 row">
                                            <label for="old_password" class="col-md-2 col-form-label">Old Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" value=""
                                                    id="old_password" name="old_password" required >
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label for="new_password" class="col-md-2 col-form-label">New Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" value=""
                                                    id="new_password" name="new_password" required >
                                            </div>
                                        </div>

                                            <div class="mb-3 row">
                                            <label for="confirm_password" class="col-md-2 col-form-label">Confirm Password </label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" value=""
                                                    id="confirm_password" name="confirm_password" required >
                                            </div>
                                        </div>







                                        <div class="d-flex flex-wrap gap-2">
                                        <button  type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Reset
                                        </button>
                                    </div>



                                    </div>
                                </div>
                            </div> <!-- end col -->
  </form>
                            <!-- end col -->
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

    $(document).ready(function() {
    var options = {
        beforeSubmit: showRequest, // pre-submit callback
        success: showResponse // post-submit callback

        // other available options:
        //url:       url         // override for form's 'action' attribute
        //type:      type        // 'get' or 'post', override for form's 'method' attribute
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type)
        //clearForm: true        // clear all form fields after successful submit
        //resetForm: true        // reset the form after successful submit

        // $.ajax options can be used here too, for example:
        //timeout:   3000
    };

    // bind form using 'ajaxForm'
    $('#formPassword').ajaxForm(options);
});

function showRequest(formData, jqForm, options) {

    // formData is an array; here we use $.param to convert it to a string to display it
    // but the form plugin does this for you automatically when it submits the data
    var queryString = $.param(formData);

    // jqForm is a jQuery object encapsulating the form element.  To access the
    // DOM element for the form do this:
    // var formElement = jqForm[0];

    // alert('About to submit: \n\n' + queryString);

    // here we could return false to prevent the form from being submitted;
    // returning anything other than false will allow the form submit to continue
    return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form) {


    if (responseText['status'] == 1) {
        toastr["success"](responseText['msg']);
        $('#formPassword').trigger("reset");


    } else if (responseText['status'] == 0) {

        toastr["error"](responseText['msg']);

    }

    // for normal html responses, the first argument to the success callback
    // is the XMLHttpRequest object's responseText property

    // if the ajaxForm method was passed an Options Object with the dataType
    // property set to 'xml' then the first argument to the success callback
    // is the XMLHttpRequest object's responseXML property

    // if the ajaxForm method was passed an Options Object with the dataType
    // property set to 'json' then the first argument to the success callback
    // is the json data object returned by the server

    // alert('status: ' + statusText + '\n\nresponseText: \n' + responseText +
    //     '\n\nThe output div should have already been updated with the responseText.');
}



</script>
@endsection
