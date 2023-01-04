<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

use DataTables;

use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('department');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Department::latest()->get();
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
        return view('add_department');
    }

    function add_validation(Request $request)
    {
        $request->validate([
            'department_name'       =>  'required',
            'contact_person'        =>  'required'
        ]);

        $data = $request->all();

        Department::create([
            'department_name'       =>  $data['department_name'],
            'contact_person'        =>  implode(", ", $data['contact_person'])
        ]);

        return redirect('department')->with('success', 'New Department Added');
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);

        return view('edit_department', compact('data'));
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'department_name'       =>  'required',
            'contact_person'        =>  'required'
        ]);

        $data = $request->all();

        $form_data = array(
            'department_name'       =>  $data['department_name'],
            'contact_person'        =>  implode(", ", $data['contact_person'])
        );

        Department::whereId($data['hidden_id'])->update($form_data);

        return redirect('department')->with('success', 'Department Data Updated');
    }

    function delete($id)
    {
        $data = Department::findOrFail($id);

        $data->delete();

        return redirect('department')->with('success', 'Department Data Removed');
    }
}
