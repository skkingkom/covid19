<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserCovidInfo;
use App\Models\UserAddress;

class CovidController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function registerUser()
    {
    	return view('register-covid-user');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Illuminate\Http\Request
     * @return \App\User
     */
    public function saveUser(Request $request)
    {
    	$data = $request->all();
    	$validator = $this->validator($data);
    	//dd($validator->errors());
    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator->errors())->withInput();
    	}
    	$save = UserCovidInfo::create([
		            'firstname' => $data['first_name'],
		            'lastname' => $data['last_name'],
		            'email' => $data['email'],
		            'mobile' => $data['mobile'],
		            'symption_type' => $data['symption_type'],
		            'covid_test' => $data['covid_test'],
		            'positive' => $data['positive'],
		        ]);
    	if ($save) {
    		$userID = $save->id;
    		$saveaddress = UserAddress::create([
    				'user_id' => $userID,
		            'address' => $data['address'],
		            'cityname' => $data['cityname'],
		            'pincode' => $data['pincode'],
		        ]);
    	} else{
    		return redirect()->back()->with('error', 'some problem to run save, please try again')->withInput();
    	}
    	return redirect()->back()->with('success', 'Save sucessfully');   
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user_covid_info'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:user_covid_info',
            'symption_type' => ['required', 'boolean'],
            'covid_test' => ['required', 'boolean'],
            'positive' => ['required', 'boolean'],
            'address' => ['required', 'string', 'max:255'],
            'cityname' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'numeric'],
        ]);
    }
}
