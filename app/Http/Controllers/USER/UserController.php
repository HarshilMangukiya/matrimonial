<?php

namespace App\Http\Controllers\USER;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PartnerPreference;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    //- list of users data with ajax
    public function index()
    {
		$data['title'] = "Users";
		return view('user.users.index',compact('data'));
	}  

    public function ajax(Request $request)
    {
        $currentPreference = PartnerPreference::where('user_id', Auth::user()->id)->first();
        $partners = User::where('id','!=',Auth::user()->id)->get();
        $occupations = explode(',', $currentPreference->occupation);
        $familyTypes = explode(',', $currentPreference->family_type);
        $filteredData = array();

        foreach ($partners as $p => $partner) {
            $points = 0;

            if($partner->annual_income >= $currentPreference->salary_from && $partner->annual_income <= $currentPreference->salary_to){
                $points++;
            }

            foreach ($occupations as $o => $occupation) {
                if($occupation == $partner->occupation){
                    $points++;
                    break;
                }
            }

            foreach ($familyTypes as $f => $familyType) {
                if($familyType == $partner->family_type){
                    $points++;
                    break;
                }
            }

            if($currentPreference->manglik == 3){
                $points++;
            }else{
                if($currentPreference->manglik == $partner->manglik){
                    $points++;
                }
            }

            $filteredDataValue = array();
            $filteredDataValue['points'] = $points;
            $filteredDataValue['id'] = $partner->id;
            array_push($filteredData,$filteredDataValue);
        }
        arsort($filteredData);
        
        $userIds = array();
        foreach($filteredData as $key => $value){
            array_push($userIds, $filteredData[$key]['id']);
        }

        $idsOrdered = implode(',', $userIds);

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

		$query = User::where('id','!=',Auth::user()->id);
		$recordsTotal = $query->count();
		$recordsFiltered = $recordsTotal; // when there is no search parameter then total number rows = total number filtered rows.
		$query = User::query();
		$query->select($selectColumns);
		$query->limit($request->length);
		$query->offset($request->start);
        $query->whereIn('id', $userIds);
        $query->orderByRaw("FIELD(id, $idsOrdered)");

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


    //- save user registration info
    public function save(Request $request)
    {
        $rules = array();
        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['email'] = 'required';
        $rules['password'] = 'required';
        $rules['confirm_password'] = 'required';
        $rules['gender'] = 'required';
        $rules['dob'] = 'required';
        $rules['annual_income'] = 'required';
        $rules['occupation'] = 'required';
        $rules['family_type'] = 'required';
        $rules['manglik'] = 'required';
        $rules['partner_annual_income'] = 'required';
        $rules['partner_family_type'] = 'required';
        $rules['partner_manglik'] = 'required';
        $rules['partner_occupation'] = 'required';

		$customMessage = array(
			'occupation.required' => "Please select occupation",
			'family_type.required' => "Please select family type",
			'manglik.required' => "Please select mangli",
			'partner_family_type.required' => "Please select partner family type which you expect",
			'partner_manglik.required' => "Please select manglik or not",
			'partner_occupation.required' => "Please select occupation which you expect",
		);

		$validator = Validator::make($request->all(), $rules, $customMessage);
		if ($validator->fails()) {
			$response = errorRes("Please fill the blanks");
			$response['data'] = $validator->errors();

		}else{

            if($request->agent_password != $request->agent_confirm_password){
				$response = errorRes("Password does not match");
				return response()->json($response)->header('Content-Type', 'application/json');
			}

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->dob = dateYMDFormat($request->dob);
            $user->annual_income = $request->annual_income;
            $user->occupation = $request->occupation;
            $user->family_type = $request->family_type;
            $user->manglik = $request->manglik;
            $user->save();

            //- save partner preferences information
            $partnerAnnualIncome = explode(";", $request->partner_annual_income);
            $partnerPreference = new PartnerPreference;
            $partnerPreference->user_id = $user->id;
            $partnerPreference->salary_from = $partnerAnnualIncome[0];
            $partnerPreference->salary_to = $partnerAnnualIncome[1];
            $partnerPreference->occupation = implode(",",$request->partner_occupation);
            $partnerPreference->family_type = implode(",",$request->partner_family_type);
            $partnerPreference->manglik = $request->manglik;
            $partnerPreference->save();

            $response = array();
			$response = successRes("You're successfully registered");
        }
        return response()->json($response)->header('Content-Type', 'application/json');
    }
}
