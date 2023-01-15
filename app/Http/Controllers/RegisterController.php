<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Register;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('register');
    }
    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $query = Register::join('users', 'users.id', '=', 'register_meet_person_name');


            if(Auth::user()->type == 'User')
            {
                $query->where('register_meet_person_name', '=', Auth::user()->id);
            }

            $data = $query ->get(['registers.register_firstname', 'registers.register_lastname', 'registers.register_email', 'registers.register_mobile_no', 'registers.register_gender', 'registers.register_address', 'registers.register_visitdate', 'registers.register_meet_person_name', 'users.name', 'registers.id']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/register/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    function add()
    {
        $user['data'] = User::orderby("name","asc")->where('type', '=', 'User')->where('status', '=', 'Active')
        ->select('id','name')
        ->get();
        return view('add_register')->with("user",$user);
      
    }

    function add_validation(Request $request)
    {
        $request->validate([

         
            'register_firstname'      =>  'required',
            'register_lastname'       =>  'required',
            'register_email'          =>  'required|email|unique:registers',
            'register_mobile_no'      =>  'required',
            'register_gender'         =>  'required',
            'register_address'        =>  'required',
            'register_visitdate'      =>  'required',
            
        ]);

        $data = $request->all();


        Register::create([
            'register_firstname'           =>  $data['register_firstname'],
            'register_lastname'            =>  $data['register_lastname'],
            'register_email'               =>  $data['register_email'],
            'register_mobile_no'           =>  $data['register_mobile_no'],
            'register_gender'              =>  $data['register_gender'],
            'register_meet_person_name'    =>  $data['register_meet_person_name'],
            'register_address'             =>  $data['register_address'],
            'register_visitdate'           =>  $data['register_visitdate'],
            'register_enter_by'            =>   Auth::user()->id,
          
        ]);

        return redirect('register')->with('success', 'New Pre- Register Visitor Added');
    }

    function delete($id)
    {
        $data = Register::findOrFail($id);

        $data->delete();

        return redirect('register')->with('success', 'Pre- Register Visitor Removed');
    }

    public function edit($id)
    {
        $user['data'] = User::orderby("name","asc")->where('type', '=', 'User')->where('status', '=', 'Active')
        ->select('id','name')
        ->get();
        $data = Register::findOrFail($id);
        return view('edit_register', compact('data'))->with("user",$user);

    }

    function edit_validation(Request $request)
    {
        $request->validate([
           
            'register_firstname'      =>  'required',
            'register_lastname'       =>  'required',
            'register_mobile_no'      =>  'required',
            'register_gender'         =>  'required',
            'register_address'        =>  'required',
            'register_visitdate'      =>  'required',
        ]);

        $data = $request->all();

        $form_data = array(
            'register_firstname'           =>  $data['register_firstname'],
            'register_lastname'            =>  $data['register_lastname'],
            'register_email'               =>  $data['register_email'],
            'register_mobile_no'           =>  $data['register_mobile_no'],
            'register_gender'              =>  $data['register_gender'],
            'register_meet_person_name'    =>  $data['register_meet_person_name'],
            'register_address'             =>  $data['register_address'],
            'register_visitdate'           =>  $data['register_visitdate'],
            'register_enter_by'            =>   Auth::user()->id,
          
        );

        Register::whereId($data['hidden_id'])->update($form_data);

        return redirect('register')->with('success', 'Pre-Register Data Updated');
    }
   
    
    


   
   

}


