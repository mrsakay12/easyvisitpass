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
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
        return view('profile', compact('data'))->with("departments",$departments);
      
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
    public function getDept($departmentid=0){

        // Fetch Designation by Departmentid
        $empData['data'] = Designation::orderby("designation_name","asc")->where('status', '=', 'Active')
           ->select('id','designation_name')
           ->where('department_id',$departmentid)
           ->get();
   
        return response()->json($empData);
   
      }
   }



