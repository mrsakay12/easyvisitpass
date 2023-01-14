<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Employee;

use DataTables;

use Hash;

use Illuminate\Support\Facades\Auth;

class SubUserController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('sub_user');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = User::get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                       
                            return '<a href="/sub_user/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit </a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                       
                    })
                    
                    ->rawColumns(['action'])
        
                  
                    ->make(true);
        }
    }

    function add()
    {
        return view('add_sub_user');
    }

    function add_validation(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'password'      =>  'required|min:6'
        
        ]);

        $data = $request->all();

        $user = User::create([
            'name'      =>  $data['name'],
            'email'     =>  $data['email'],
            'password'  =>  Hash::make($data['password']),
            'type'      =>  $data['type'],
            'status'      =>  $data['status'],
            'profile'      =>  $data['profile'],
        ]);

      
        return redirect('employee/add')->with(['success'=>'','data'=>$user]) ;
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('edit_sub_user', compact('data'));
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
                'name'  => $data['name'],
                'email'  => $data['email'],
                'status'  => $data['status'],
                'type'  => $data['type'],
                'password' => Hash::make($data['password'])
            );
        }
        else
        {
            $form_data = array(
                'name'      =>  $data['name'],
                'email'     =>  $data['email'],
                'status'    =>  $data['status'],
                'type'      =>  $data['type'],
            );
        }

        User::whereId($data['hidden_id'])->update($form_data);

        return redirect('sub_user')->with('success', 'User Data Updated');

    }

    function delete($id)
    {
        $data = User::findOrFail($id);

        $data->delete();

        return redirect('sub_user')->with('success', 'User Data Removed');
    }
}
