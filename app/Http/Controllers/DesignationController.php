<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use DB;


use DataTables;

use Illuminate\Support\Facades\Auth;



class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        return view('designation');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            
            $query = Designation::join('departments', 'departments.id', '=', 'department_id');

            $data = $query->get(['designations.designation_name', 'designations.status', 'designations.id','departments.department_name','designations.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="/designation/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    function add()
    {
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
        return view('add_designation')->with("departments",$departments);
    }

    function add_validation(Request $request)
    {
        
        $request->validate([
            'designation_name'       =>   'required|unique:designations',
            'department_id'       =>  'required',
            'status'                 =>  'required'
        ]);

        $data = $request->all();
        $datas = DB::table('departments')->get();
        Designation::create([
            'designation_name'       =>  $data['designation_name'],
            'department_id'       =>  $data['department_id'],
            'status'        =>   $data['status'],
        ]);

        return redirect('designation')->with('success', 'New Designation Added');
    }

    public function edit($id)
    {
        $data = Designation::findOrFail($id);
        $departments['data'] = Department::orderby("department_name","asc")
        ->select('id','department_name')
        ->get();
        
        
        return view('edit_designation', compact('data'))->with("departments",$departments);
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'designation_name'       =>  'required',
            'department_id'       =>  'required',
            'status'                 =>  'required'
        ]);

        $data = $request->all();

        $form_data = array(
            'designation_name'       =>  $data['designation_name'],
            'department_id'       =>  $data['department_id'],
            
            'status'                 =>   $data['status']
        );

        Designation::whereId($data['hidden_id'])->update($form_data);

        return redirect('designation')->with('success', 'Designation Data Updated');
    }

    function delete($id)
    {
        $data = Designation::findOrFail($id);

        $data->delete();

        return redirect('designation')->with('success', 'Designation Data Removed');
    }
}
