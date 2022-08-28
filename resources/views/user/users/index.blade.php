@extends('user.layouts.main')
@section('title', $data['title'])
@section('content')

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
<script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.form.js') }}"></script>
<script type="text/javascript">

var ajaxURL='{{route("users.ajax")}}';
var csrfToken=$("[name=_token").val();


var table=$('#datatable').DataTable({
  "aoColumnDefs": [{ "bSortable": false, "aTargets": [] }],
  "processing": true,
  "serverSide": true,
  "scrollX": true,
  "ajax": {
    "url": ajaxURL,
    "type": "POST",
     "data": {
        "_token": csrfToken,
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

</script>
@endsection
