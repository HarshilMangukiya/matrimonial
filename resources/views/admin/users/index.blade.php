clearFilterFields();
@extends('admin.layouts.main')
@section('title', $data['title'])
@section('content')

<head>
    <link href="{{asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
    
    <style>
    
    ::-webkit-scrollbar {
      width: 20px;
    }
    
    ::-webkit-scrollbar-track {
      background-color: transparent;
    }
    
    ::-webkit-scrollbar-thumb {
      background-color: #d6dee1;
      border-radius: 20px;
      border: 6px solid transparent;
      background-clip: content-box;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background-color: #a8bbbf;
    }
    
    </style>
</head>

                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Users</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <!-- start row -->
                        <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="family_type" class="form-label">Family Type</label>
                                                <select class="form-control select2-ajax" id="family_type" name="family_type">
                                                    <option value="1">Joint Family</option>
                                                    <option value="2">Nuclear Family</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="manglik" class="form-label">Manglik</label>
                                                <select class="form-control select2-ajax" id="manglik" name="manglik">
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-control select2-ajax" id="gender" name="gender">
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="age" class="form-label">Age</label>
                                                <select class="form-control select2-ajax" id="age" name="age">
                                                    <option value="18-25">18-25</option>
                                                    <option value="25-30">25-30</option>
                                                    <option value="30-35">30-35</option>
                                                    <option value="35-40">35-40</option>
                                                    <option value="40-45">40-45</option>
                                                    <option value="45-50">45-50</option>
                                                    <option value="50-55">50-55</option>
                                                    <option value="55-60">55-60</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                          <div class="mb-3">
                                            <label for="button" class="form-label">&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <button type="button" onclick="clearFilterFields();" class="form-control btn btn-primary" id="btnClear">Clear</button>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xl-12">
                                            <div class="p-3">
                                                <h5 class="font-size-14 mb-3">Annualy Income</h5>
                                                <input type="text" id="annual_income" name="annual_income">
                                            </div>
                                        </div>
                                      </div>
                                        <br>
                                        <div class="table-responsive">
                                            <table id="datatable" class="table align-middle table-nowrap table-hover table-striped display nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Dob</th>
                                                <th>Gender</th>
                                                <th>Annual Income</th>
                                                <th>Occupation</th>
                                                <th>Family Type</th>
                                                <th>Manglik</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        @csrf
                                        </div>
                                    </div>
                                </div>
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
<script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/range-sliders.init.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.form.js') }}"></script>
<script type="text/javascript">


//- select2 drop down
$('#family_type').select2({
  placeholder: "Select value..",
});
$('#manglik').select2({
  placeholder: "Select value..",
});
$('#gender').select2({
  placeholder: "Select vallue..",
});
$('#age').select2({
  placeholder: "Select vallue..",
});

$(document).ready(function() {
  clearFilterFields();
});

//- range slider for annual income
$("#annual_income").ionRangeSlider({
    skin: "square",
    type: "double",
    grid: !0,
    min: 0,
    max: 10000000,
    from: 0,
    to: 0,
    prefix: "₹"
})


//- clear filter filter fields
function clearFilterFields() {
  $("#family_type").val('').trigger("change");
  $("#manglik").val('').trigger("change");
  $("#gender").val('').trigger("change");
  $("#age").val('').trigger("change");
  reloadTable();
}


var ajaxURL='{{route("admin.users.ajax")}}';
var csrfToken=$("[name=_token").val();

var table=$('#datatable').DataTable({
  "aoColumnDefs": [{ "bSortable": false, "aTargets": [] }],
  "order":[[ 0, 'desc' ]],
  "processing": true,
  "serverSide": true,
  "scrollX": true,
  "ajax": {
    "url": ajaxURL,
    "type": "POST",
     "data": {
        "_token": csrfToken,
        "family_type": function(){return $("#family_type").val();},
        "manglik": function(){return $("#manglik").val();},
        "gender": function(){return $("#gender").val();},
        "annual_income": function(){return $("#annual_income").val();},
        "age": function(){return $("#age").val();},
        }
  },
  "aoColumns" : [
    {"mData" : "id"},
    {"mData" : "first_name"},
    {"mData" : "last_name"},
    {"mData" : "email"},
    {"mData" : "dob"},
    {"mData" : "gender"},
    {"mData" : "annual_income"},
    {"mData" : "occupation"},
    {"mData" : "family_type"},
    {"mData" : "manglik"},
  ]
});


function reloadTable(){
  $('#datatable').DataTable().ajax.reload(null, false);
}
//- show data according to filter from selection
$("#family_type, #manglik, #gender, #annual_income, #age").change(function(){
  reloadTable();
});


</script>
@endsection
