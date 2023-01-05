<?php

namespace App\Http\Controllers;
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
            $data = Register::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/department/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    function add()
    {
        return view('add_register');
    }

    function add_validation(Request $request)
    {
        $request->validate([

            'visitor_purpose'      =>  'required',
            'visitor_firstname'      =>  'required',
            'visitor_lastname'      =>  'required',
            
        ]);

        $data = $request->all();


        Register::create([
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

        return redirect('register')->with('success', 'New Visitors Added');
    }

    function delete($id)
    {
        $data = Register::findOrFail($id);

        $data->delete();

        return redirect('register')->with('success', 'Visitor Removed');
    }

   
    


   
   

}


