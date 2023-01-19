<?php

namespace App\Http\Controllers;
use App\Models\Visitdetail;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use App\Models\Visitor;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use DB;

class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('visitor/visitor');
    }

    function fetch_all(Request $request)
    {

        if ($request->ajax()) {

            $query = Visitor::join('users', 'users.id', '=', 'visitor_meet_person_name');



            if (Auth::user()->type == 'User') {
                $query->where('visitor_meet_person_name', '=', Auth::user()->id);
            }

            $data = $query->get(['visitors.visitor_firstname', 'visitors.visitor_lastname', 'visitors.visitor_code', 'visitors.visitor_id', 'visitors.visitor_meet_person_name', 'visitors.visitor_purpose', 'visitors.visitor_enter_time', 'visitors.visitor_out_time', 'visitors.visit_time', 'visitors.visitor_status', 'users.name', 'visitors.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('visitor_status', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '<span class="badge bg-success">Checked In</span>';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<span class="badge bg-secondary">At Waiting Area</span>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '<span class="badge bg-secondary">Pending</span>';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<span class="badge bg-danger">Rejected</span>';
                    } else {
                        return '<span class="badge bg-info">Checked Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/in/' . $row->id . '" class="btn btn-success btn-sm">Accept</a>&nbsp;<a href="/employeeview/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '';
                    } else {
                        return '<a href="/checkoutview/' . $row->id . '" class="btn btn-success btn-sm">View Checkout</a>';
                    }
                })
                ->addColumn('arrival', function ($row) {
                    if ($row->visitor_status == 'Pending') {
                        return '<a href="/visitor/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/reschedule/' . $row->id . '" class="btn btn-success btn-sm">Re-Schedule</a>
                        ';
                    } elseif ($row->visitor_status == 'In') {
                        return '<a href="/visitor/out/' . $row->id . '" class="btn btn-info btn-sm">Check-Out</a>';
                    } elseif ($row->visitor_status == 'Out') {
                        return '<a href="/checkoutview/' . $row->id . '" class="btn btn-success btn-sm">View Checkout</a>';
                    }
                    else {
                        return '';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);

        }
    }
    function fetch_allUser(Request $request)
    {

        if ($request->ajax()) {

            $query = Visitor::join('users', 'users.id', '=', 'visitor_meet_person_name');



            if (Auth::user()->type == 'User') {
                $query->where('visitor_meet_person_name', '=', Auth::user()->id)->where('visitor_status', '=', 'Lobby');
            }

            $data = $query->get(['visitors.visitor_firstname', 'visitors.visitor_lastname', 'visitors.visitor_code', 'visitors.visitor_id', 'visitors.visitor_meet_person_name', 'visitors.visitor_purpose', 'visitors.visitor_enter_time', 'visitors.visitor_out_time', 'visitors.visitor_status', 'users.name', 'visitors.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('visitor_status', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '<span class="badge bg-success">Checked In</span>';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<span class="badge bg-secondary">At Waiting Area</span>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '<span class="badge bg-secondary">Pending</span>';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<span class="badge bg-danger">Rejected</span>';
                    } else {
                        return '<span class="badge bg-info">Checked Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/in/' . $row->id . '" class="btn btn-success btn-sm">Accept</a>&nbsp;<a href="/employeeview/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '';
                    } else {
                        return '<a href="/checkoutview/' . $row->id . '" class="btn btn-success btn-sm">View Checkout</a>';
                    }
                })
                ->addColumn('arrival', function ($row) {
                    if ($row->visitor_status == 'Pending') {
                        return '<a href="/visitor/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/reschedule/' . $row->id . '" class="btn btn-success btn-sm">Re-Schedule</a>
                        ';
                    } elseif ($row->visitor_status == 'In') {
                        return '<a href="/visitor/out/' . $row->id . '" class="btn btn-info btn-sm">Check-Out</a>';
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);

        }
    }

    function fetch_allrecep(Request $request)
    {

        if ($request->ajax()) {

            $query = Visitor::join('users', 'users.id', '=', 'visitor_meet_person_name');
             


                if (Auth::user()->type == 'Receptionist') {
                    $query->where('visitor_status', '=', 'In');
                }


            $data = $query->get([
                'visitors.visitor_firstname',
                'visitors.visitor_lastname',
                'visitors.visitor_code',
                'visitors.visitor_id',
                'visitors.visitor_meet_person_name',
                'visitors.visitor_purpose',
                'visitors.visitor_enter_time',
                'visitors.visitor_out_time',
                'visitors.visitor_status',
                'users.name',
                'visitors.id',
             
            ]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('visitor_status', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '<span class="badge bg-success">Checked In</span>';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<span class="badge bg-secondary">At Waiting Area</span>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '<span class="badge bg-secondary">Pending</span>';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<span class="badge bg-danger">Rejected</span>';
                    } else {
                        return '<span class="badge bg-info">Checked Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action', function ($row) {
                    if ($row->visitor_status == 'In') {
                        return '';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/in/' . $row->id . '" class="btn btn-success btn-sm">Accept</a>&nbsp;<a href="/employeeview/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Rejected') {
                        return '<button type="button" class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                    } elseif ($row->visitor_status == 'Pending') {
                        return '';
                    } else {
                        return '<a href="/checkoutview/in/' . $row->id . '" class="btn btn-success btn-sm">View Checkout</a>';
                    }
                })
                ->addColumn('arrival', function ($row) {
                    if ($row->visitor_status == 'Pending') {
                        return '<a href="/visitor/edit/' . $row->id . '" class="btn btn-info btn-sm">View</a>&nbsp;<a href="/visitor/rejected/' . $row->id . '" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    } elseif ($row->visitor_status == 'Lobby') {
                        return '<a href="/visitor/reschedule/' . $row->id . '" class="btn btn-success btn-sm">Re-Schedule</a>
                        ';
                    } elseif ($row->visitor_status == 'In') {
                        return '<a href="/visitor/out/' . $row->id . '" class="btn btn-info btn-sm">Check-Out</a>';
                    } else {
                        return '<a href="/checkoutview/' . $row->id . '" class="btn btn-success btn-sm">View Checkout</a>';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);

        }
    }

    function add()
    {
        $user['data'] = User::orderby("name", "asc")->where('type', '=', 'User')->where('status', '=', 'Active')
            ->select('id', 'name')
            ->get();
        return view('visitor/add_visitor')->with("user", $user);
    }


    function add_validation(Request $request)
    {
        $request->validate([


            'visitor_purpose' => 'required',
            'visitor_firstname' => 'required',
            'visitor_lastname' => 'required',
            'visitor_email' => 'required|email|unique:visitdetails',
            'visitor_mobile_no' => 'required',
            'visitor_gender' => 'required',
            'visitor_address' => 'required',
            'visitor_id' => 'required',
            'visitor_meet_person_name' => 'required',
            'visit_time' => 'required',

        ]);

        $data = $request->all();

        $visitor_code = IdGenerator::generate(['table' => 'visitors', 'field' => 'visitor_code', 'length' => 12, 'prefix' => 'EVPASS-']);

        Visitor::create([
            'visitor_code' => $visitor_code,
            'visitor_firstname' => $data['visitor_firstname'],
            'visitor_lastname' => $data['visitor_lastname'],
            'visitor_email' => $data['visitor_email'],
            'visitor_mobile_no' => $data['visitor_mobile_no'],
            'visitor_gender' => $data['visitor_gender'],
            'visitor_address' => $data['visitor_address'],
            'visitor_id' => $data['visitor_id'],
            'visitor_meet_person_name' => $data['visitor_meet_person_name'],
            'visitor_purpose' => $data['visitor_purpose'],
            'visitor_status' => 'Pending',
            'visitor_enter_by' => Auth::user()->id,
            'visit_time' => $data['visit_time'],

        ]);

        Visitdetail::create([
            'visitor_firstname' => $data['visitor_firstname'],
            'visitor_lastname' => $data['visitor_lastname'],
            'visitor_email' => $data['visitor_email'],
            'visitor_mobile_no' => $data['visitor_mobile_no'],
            'visitor_gender' => $data['visitor_gender'],
            'visitor_address' => $data['visitor_address'],
            'visitor_id' => $data['visitor_id'],
            'visitor_enter_by' => Auth::user()->id,

        ]);

        return redirect('visitor')->with('success', 'New Visitor Added');
    }

    function delete($id)
    {
        $data = Visitor::findOrFail($id);

        $data->delete();

        return redirect('visitor')->with('success', 'Visitor Removed');
    }






    function rejected($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(

            'visitor_status' => 'rejected',



        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Rejected');
    }

    function arrive($id)
    {
        $data = Visitor::findOrFail($id);

        $form_data = array(

            'visitor_status' => 'Lobby',
            'visitor_image' => $data['visitor_image'],

        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Arrived');
    }

    function in($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(

            'visitor_status' => 'In',
            'visitor_enter_time' => $currentTime,


        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Checked In');
    }
    function out($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(

            'visitor_status' => 'Out',
            'visitor_out_time' => $currentTime,


        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Checked Out');
    }
    function reschedule($id)
    {
        $data = Visitor::findOrFail($id);

        $form_data = array(

            'visitor_status' => 'Pending',


        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Re-schedule');
    }

    function visitorimage()
    {

        return view('visitor/createimage');
    }
    function employeeview1()
    {

        return view('visitor/employeeview');
    }


    public function edit($id)
    {
        $data = Visitor::findOrFail($id);

        return view('visitor/createimage', compact('data'));
    }
    public function employeeview($id)
    {
        $data = Visitor::findOrFail($id);

        return view('visitor/employeeview', compact('data'));
    }

    public function checkoutview($id)
    {
        $data = Visitor::findOrFail($id);

        return view('visitor/checkoutview', compact('data'));
    }
}



