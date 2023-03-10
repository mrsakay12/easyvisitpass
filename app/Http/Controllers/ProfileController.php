<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        $data2 = Employee::where('user_id', '=' ,Auth::user()->id)->firstOrFail();
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
        $designations['data'] = Designation::orderby("designation_name","asc")
        ->select('id','designation_name')
        ->get();
        return view('employee/profile', compact('data','data2'))->with("departments",$departments)->with("designations",$designations);
      
    }

    
    function company()
    {
        $data = User::findOrFail(Auth::user()->id);
       
        return view('employee/company', compact('data'));
      
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'email'     =>  'required|email',
            'name'      =>  'required'
        ]);

        $data = $request->all();
 

        if(!empty($data['password']))
        {
            $form_data = array(
                'name'      =>  $data['name'],
                'email'     =>  $data['email'],
                'password'  =>  Hash::make($data['password'])
            );
        }
        else
        {
            $form_data = array(
                'name'      =>  $data['name'],
                'email'     =>  $data['email']
            );
        }

        User::whereId(Auth::user()->id)->update($form_data);

        return redirect('profile')->with('success', 'Profile Data Updated');
        
    }
    


    function company_validation(Request $request)
    {
        $request->validate([
            'comp_name'     =>  'required',
            'comp_add'      =>  'required'
        ]);

        $data = $request->all();
 

       
            $form_data = array(
                'comp_name'     =>  $data['comp_name'],
                'comp_add'     =>  $data['comp_add'],
               
            );
        

        User::whereId(Auth::user()->id)->update($form_data);

        return redirect('company')->with('success', 'Company Data Updated');
        
    }
   
   }



