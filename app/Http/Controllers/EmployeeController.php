<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Department;
use App\Models\Designation;
use Hash;
use Session;




class EmployeeController extends Controller
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
        return view('profile', compact('data','data2'))->with("departments",$departments);
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
                'address'    =>  $data['address'],
                'department_id'     =>  $data['department_id'],
                'designation_id'     =>  $data['designation_id'],
                'about'     =>  $data['about'],
                'user_id'     =>  Auth::user()->id,
                'modified_by'     =>  Auth::user()->id,
                
            );
            Employee::whereId($data['hidden_id'])->update($form_data);
    
        return redirect('profile')->with('success', 'Profile Data Updated');
    
    }
    function edit_empvalidation(Request $request)
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
                'address'    =>  $data['address'],
                'department_id'     =>  $data['department_id'],
                'designation_id'     =>  $data['designation_id'],
                'about'     =>  $data['about'],
                'user_id'     =>  Auth::user()->id,
                'modified_by'     =>  Auth::user()->id,
                
            );
            Employee::whereId($data['hidden_id'])->update($form_data);
    
        return redirect('sub_user')->with('success', 'Profile Data Updated');
    
    }
    function add()
    {
        $user = Session::get('data');
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
          $designations['data'] = Designation::orderby("designation_name","asc")
        ->select('id','designation_name')
        ->get();
        return view('add_employee')->with("departments",$departments)->with("user", $user)->with("designations",$designations);
 


        
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
            'department_id' =>  $data['department_id'],
            'designation_id'=>  $data['designation_id'],
            'user_id'       =>  $data['user_id'],
            'created_by'    =>  Auth::user()->id,
        ]);
        

        return redirect('sub_user')->with('success', 'Employee Successfully Added');
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