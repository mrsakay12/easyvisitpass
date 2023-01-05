<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Traits\Userid;
use App\Models\Department;
use App\Models\Designation;
use Hash;




class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
       
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
        return view('profile', compact('data'))->with("departments",$departments);
     
    }




    function edit_validation(Request $request)
    {
        $request->validate([
            'first_name'     =>  'required',
            'last_name'      =>  'required'
        ]);

        $data = $request->all();
          
        
        
           
            $form_data = array(
                'first_name'    =>  $data['first_name'],
                'last_name'     =>  $data['last_name'],
                'phone'    =>  $data['phone'],
                'nickname'     =>  $data['nickname'],
                'gender'    =>  $data['gender'],
                'department_id'     =>  $data['department_id'],
                'designation_id'     =>  $data['designation_id'],
                'about'     =>  $data['about'],
                'user_id'     =>  Auth::user()->id,
                'modified_by'     =>  Auth::user()->id,
                
            );
            Employee::whereId($data['hidden_id'])->update($form_data);
    
        return redirect('profile')->with('success', 'Profile Data Updated');
    
    }

    function add_validation(Request $request)
    {
        $request->validate([
            'first_name'     =>  'required',
            'last_name'      =>  'required',
            
        ]);

        $data = $request->all();

        Employee::create([
            'first_name'    =>  $data['first_name'],
            'last_name'     =>  $data['last_name'],
            'phone'         =>  $data['phone'],
            'nickname'      =>  $data['nickname'],
            'gender'        =>  $data['gender'],
            'department_id' =>  $data['department_id'],
            'designation_id'=>  $data['designation_id'],
            'about'         =>  $data['about'],
            'user_id'       =>   Auth::user()->id,
            'created_by'    =>  Auth::user()->id,
        ]);

        return redirect('profile')->with('success', 'Profile Information Updated');
    }

}
