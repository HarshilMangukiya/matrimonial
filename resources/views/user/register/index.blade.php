@extends('user.register.layouts.main')
@section('title', 'registration')
@section('content')

<head>
    <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
        <div class="page-content">
            <div class="container-fluid">
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">registration</h4>
                        </div>
                    </div>
                </div>
                <!-- start row -->
                <div class="row">
                    <div class="card">
                        <h6 class="font-size-16 mb-4 mt-3">Basic Information</h6>
                        <form action="{{route('user.save')}}" method="POST" id="formRegistration" class="needs-validation" novalidate>
                        @csrf
                            <div class="row">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name*</label>
                                            <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="First name" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last name*</label>
                                            <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Last name" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password*</label>
                                            <input type="text" class="form-control" id="password"  name="password" placeholder="Password" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password*</label>
                                            <input type="text" class="form-control" id="confirm_password"  name="confirm_password" placeholder="Confirm password" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mt-2">
                                        <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender*</label>
                                            <div class="form-check">
                                                <input class="form-check-inline" type="radio" name="gender" id="gender1" value="1" checked>
                                                <label class="form-check-label font-size-16 me-5" for="gender1">Male</label>
                                                <input class="form-check-inline" type="radio" name="gender" id="gender2" value="2">
                                                <label class="form-check-label font-size-16 me-5" for="gender2">Female</label>
                                                <input class="form-check-inline" type="radio" name="gender" id="gender3" value="3">
                                                <label class="form-check-label font-size-16" for="gender3">Other</label>
                                            </div>
                                        </div>
                                    </div>        
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="dob" class="form-label">DOB*</label>
                                            <input type="text" class="form-control" name="dob" id="dob" placeholder="Select date of birth" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="annual_income" class="form-label">Annual Income*</label>
                                            <input type="text" class="form-control" name="annual_income" id="annual_income" onkeypress="isNumber(event);" placeholder="Enter annual income" value="" required>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="occupation" class="form-label">Occupation*</label>
                                            <select class="form-control select2-ajax" id="occupation" name="occupation" required>
                                                <option value="1">Private Job</option>
                                                <option value="2">Government Job</option>
                                                <option value="3">Business</option>
                                            </select>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="family_type" class="form-label">Family Type*</label>
                                            <select class="form-control select2-ajax" id="family_type" name="family_type" required>
                                                <option value="1">Joint Family</option>
                                                <option value="2">Nuclear Family</option>
                                            </select>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="manglik" class="form-label">Manglik*</label>
                                            <select class="form-control select2-ajax" id="manglik" name="manglik" required>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>
    
                                <h6 class="font-size-16 mb-4 mt-3">Partner Preference</h6>

                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="p-3">
                                            <h5 class="font-size-14 mb-3">Annualy Income</h5>
                                            <input type="text" id="partner_annual_income" name="partner_annual_income">
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="partner_family_type" class="form-label">Family Type*</label>
                                            <select class="form-control select2-ajax" id="partner_family_type" name="partner_family_type[]" required>
                                                <option value="1">Joint Family</option>
                                                <option value="2">Nuclear Family</option>
                                            </select>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="partner_manglik" class="form-label">Manglik*</label>
                                            <select class="form-control select2-ajax" id="partner_manglik" name="partner_manglik" required>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                <option value="3">Both</option>
                                            </select>
                                            <div class="invalid-feedback">This value is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="partner_occupation" class="form-label">Occupation*</label>
                                        <select class="form-control select2-ajax" id="partner_occupation" name="partner_occupation[]" required>
                                            <option value="1">Private Job</option>
                                            <option value="2">Government Job</option>
                                            <option value="3">Business</option>
                                        </select>
                                        <div class="invalid-feedback">This value is required.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="button" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <button type="submit" class="form-control btn btn-primary" id="btnAgentSave">Insert</button>
                                        </div>
                                    </div>
                                </div>
    
                            </div>     
                        </form>

                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>


@endsection('content')
@section('custom-scripts')

<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/range-sliders.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.form.js') }}"></script>
<script type="text/javascript">


//- password validation
$("#password, #confirm_password").on('change',function (){
    if($("#password").val() == $("#confirm_password").val() && ($("#password").val() != '' || $("#confirm_password").val() != '')){
        toastr["success"]("Password match!");
    }else if($("#password").val() != $("#confirm_password").val() && ($("#password").val() != '' && $("#confirm_password").val() != '')){
        toastr["error"]("Password doesn't match!");
    }
});

// input only numerics validation
function isNumber(evt){
    var ch = String.fromCharCode(evt.which);
    if((!/[0-9]/.test(ch))){
      evt.preventDefault();
    }
}

//- show error message if user's age is less than 18 years
$("#dob").change(function(){
    var dob = $("#dob").val();
    dob = dob.split('-');
    var dob = new Date(dob[2], dob[1]-1, dob[0]);
    dob.setFullYear(dob.getFullYear() + 18);

    if(dob > new Date()){
        toastr["error"]("Only users who are at least 18 years old can register.");
        $("#dob").val('');
    }
}); 


//- date picker
$("#dob").datepicker({
    format: "dd-mm-yyyy",
    orientation: "bottom auto"
}).on('changeDate', function(){
    $('.datepicker').hide();
});


//- select2 drop down
$('#occupation').select2({
  placeholder: "Select value..",
});
$('#family_type').select2({
  placeholder: "Select value..",
});
$('#manglik').select2({
  placeholder: "Select value..",
});

$("#family_type").val('').trigger("change");
$("#manglik").val('').trigger("change");
$("#occupation").val('').trigger("change");

//- partner occupation selection
$('#partner_occupation').select2({
    multiple:true,
    placeholder: 'Select value...',
    tokenSeparators: [','],
});
$('#partner_occupation').val("").trigger('change');

//- partner family type selection
$('#partner_family_type').select2({
    multiple:true,
    placeholder: 'Select value...',
    tokenSeparators: [','],
});
$('#partner_family_type').val("").trigger('change');



//- partner manglik selection
$('#partner_manglik').select2();

//- range slider of annual income
$("#partner_annual_income").ionRangeSlider({
    skin: "square",
    type: "double",
    grid: !0,
    min: 0,
    max: 10000000,
    from: 10000,
    to: 500000,
    prefix: "₹"
})

//- clear form data
function resetInputForm(){
    $("#formRegistration").trigger('reset');
}


//- add masters data ajax
$(document).ready(function() {

    var options = {
        beforeSubmit: showRequest, // pre-submit callback
        success: showResponse // post-submit callback
    };

    console.log($("#partner_occupation").val());
    $('#formRegistration').ajaxForm(options);
});

function showRequest(formData, jqForm, options) {
    var queryString = $.param(formData);
    return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form) {

    if (responseText['status'] == 1) {

        toastr["success"](responseText['msg']);
        $("#"+$form[0].id+"").removeClass('was-validated');
        resetInputForm();
        window.location = "{{route('user.login')}}";
    }else if (responseText['status'] == 0) {
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
