<?php

namespace App\Http\Controllers;

use App\Models\Preregister;
use App\Http\Requests\StorePre_registerRequest;
use App\Http\Requests\UpdatePre_registerRequest;
use Illuminate\Http\Request;
use App\Models\Visitor;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PreRegisterController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('pre_register');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $query = Preregister::join('users', 'users.id', '=', 'register_meet_person_name');

            if(Auth::user()->type == 'User')
            {
                $query->where('register_meet_person_name', '=', Auth::user()->id);
            }

            $data = $query->get(['pre_registers.register_firstname', 'pre_registers.register_lastname', 'pre_registers.register_email', 'pre_registers.register_mobile_no', 'pre_registers.register_gender', 'pre_registers.register_address',  'users.name', 'pre_registers.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                
                ->addColumn('action', function($row){
                    return '<a href="/pre_register/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
               
                ->rawColumns(['action'])
                ->make(true);
                
        }
    }
    function add()
    {
        return view('add_pre_register');
    }

    function add_validation(Request $request)
    {
        $request->validate([

            'visitor_purpose'      =>  'required',
            'visitor_firstname'      =>  'required',
            'visitor_lastname'      =>  'required',
            
        ]);

        $data = $request->all();


        Preregister::create([
            'visitor_code'           =>  $data['visitor_code'],
            'visitor_firstname'      =>  $data['visitor_firstname'],
            'visitor_lastname'       =>  $data['visitor_lastname'],
            'visitor_email'          =>  $data['visitor_email'],
            'visitor_mobile_no'      =>  $data['visitor_mobile_no'],
            'visitor_gender'         =>  $data['visitor_gender'],
            'visitor_address'        =>  $data['visitor_address'],
            'visitor_id'             =>  $data['visitor_id'],
            'visitor_meet_person_name'  =>  $data['visitor_meet_person_name'],
            'visitor_purpose'        =>  $data['visitor_purpose'],
            'visitor_status'        =>  $data['visitor_status'],
            'visitor_enter_by'       =>   Auth::user()->id,
          
        ]);

        return redirect('visitor')->with('success', 'New Visitors Added');
    }

    function delete($id)
    {
        $data = Preregister::findOrFail($id);

        $data->delete();

        return redirect('pre_register')->with('success', 'Pre- Register Removed');
    }

   
    
}

