<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    
    //- list of users data with ajax
    public function index(){
		$data['title'] = "Users";
		return view('admin.users.index',compact('data'));
	}  

    public function ajax(Request $request)
    {
  
        $searchColumns = array(
			'users.id',
			'users.first_name',
			'users.last_name',
			'users.email',
			'users.dob',
			'users.gender',
			'users.annual_income',
			'users.occupation',
			'users.family_type',
			'users.manglik',
		);

        $sortingColumns = array( 
			// datatable column index  => database column name
			0 => 'users.id',
			1 => 'users.first_name',
			2 => 'users.last_name',
			3 => 'users.email',
			4 => 'users.dob',
			5 => 'users.gender',
			6 => 'users.annual_income',
			7 => 'users.occupation',
			8 => 'users.family_type',
			9 => 'users.manglik',
		);

        $selectColumns = array(
			'users.*'
		);

        $annualIncome = explode(';', $request->annual_income);

		$query = User::query();
        if(isset($request->family_type)){
            $query->where('family_type', $request->family_type);
        }
        if(isset($request->manglik)){
            $query->where('manglik', $request->manglik);
        }
        if(isset($request->gender)){
            $query->where('gender', $request->gender);
        }
        if($annualIncome[1] !=0){
            $query->where('annual_income','>=', $annualIncome[0])->where('annual_income','<=', $annualIncome[1]);
        }
        if(isset($request->age)){
            $age = explode('-', $request->age);
            $query->where('age','>=', $age[0])->where('age','<=', $age[1]);
        }

		$recordsTotal = $query->count();
		$recordsFiltered = $recordsTotal; // when there is no search parameter then total number rows = total number filtered rows.

		$query = User::query();
		$query->select($selectColumns);
		$query->limit($request->length);
		$query->offset($request->start);
        $query->orderBy($sortingColumns[$request['order'][0]['column']], $request['order'][0]['dir']);

		if (isset($request['search']['value'])) {
			$isFilterApply = 1;
			$search_value = $request['search']['value'];
			$query->where(function ($query) use ($search_value, $searchColumns) {
				for ($i = 0; $i < count($searchColumns); $i++) {
					if ($i == 0) {
						$query->where($searchColumns[$i], 'like', "%" . $search_value . "%");
					} else {
						$query->orWhere($searchColumns[$i], 'like', "%" . $search_value . "%");
					}
				}
			});
		}

        if(isset($request->family_type)){
            $query->where('family_type', $request->family_type);
        }
        if(isset($request->manglik)){
            $query->where('manglik', $request->manglik);
        }
        if(isset($request->gender)){
            $query->where('gender', $request->gender);
        }
        if($annualIncome[1] !=0){
            $query->where('annual_income','>=', $annualIncome[0])->where('annual_income','<=', $annualIncome[1]);
        }
        if(isset($request->age)){
            $age = explode('-', $request->age);
            $query->where('age','>=', $age[0])->where('age','<=', $age[1]);
        }   

		$data = $query->get();
		$data = json_decode(json_encode($data), true);


		$viewData=array();
        
		foreach ($data as $key => $value) {

			$viewData[$key]=array();
			$viewData[$key]['id']=$value['id'];
			$viewData[$key]['first_name']=$value['first_name'];
			$viewData[$key]['last_name']=$value['last_name'];
			$viewData[$key]['email']=$value['email'];
			$viewData[$key]['dob']=dateDMYFormat($value['dob']);
            $viewData[$key]['annual_income']="₹".$value['annual_income'];

            if($value['gender'] == 1){
                $viewData[$key]['gender']="Male";
            }else if($value['gender'] == 2){
                $viewData[$key]['gender']="Female";                
            }else{
                $viewData[$key]['gender']="Other";
            }

            if($value['occupation'] == 1){
                $viewData[$key]['occupation']="Private Job";
            }else if($value['occupation'] == 2){
                $viewData[$key]['occupation']="Government Job";                
            }else if($value['occupation'] == 3){
                $viewData[$key]['occupation']="Business";
            }else{
                $viewData[$key]['occupation']="";
            }

            if($value['family_type'] == 1){
                $viewData[$key]['family_type']="Joint Family";
            }else if($value['family_type'] == 2){
                $viewData[$key]['family_type']="Nuclear Family";                
            }else{
                $viewData[$key]['family_type']="";
            }

            if($value['manglik'] == 1){
                $viewData[$key]['manglik']="Yes";
            }else if($value['manglik'] == 2){
                $viewData[$key]['manglik']="No";                
            }else{
                $viewData[$key]['manglik']="";
            }

		}

		$jsonData = array(
			"draw" => intval($request['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal" => intval($recordsTotal), // total number of records
			"recordsFiltered" => intval($recordsFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data" => $viewData, // total data array

		);
		return $jsonData;
    }

}
