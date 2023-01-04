<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;



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
            $data = Designation::latest()->get();
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
        return view('add_designation');
    }

    function add_validation(Request $request)
    {
        $request->validate([
            'designation_name'       =>  'required',
            'status'                 =>  'required'
        ]);

        $data = $request->all();

        Designation::create([
            'designation_name'       =>  $data['designation_name'],
            'status'        =>   $data['status']
        ]);

        return redirect('designation')->with('success', 'New Designation Added');
    }

    public function edit($id)
    {
        $data = Designation::findOrFail($id);

        return view('edit_designation', compact('data'));
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'designation_name'       =>  'required',
            'status'                 =>  'required'
        ]);

        $data = $request->all();

        $form_data = array(
            'designation_name'       =>  $data['designation_name'],
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
