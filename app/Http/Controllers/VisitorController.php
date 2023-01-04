<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Visitor;

use DataTables;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class VisitorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('visitor');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $query = Visitor::join('users', 'users.id', '=', 'visitor_meet_person_name');

            if(Auth::user()->type == 'User')
            {
                $query->where('visitor_meet_person_name', '=', Auth::user()->id);
            }

            $data = $query->get(['visitors.visitor_firstname', 'visitors.visitor_lastname', 'visitors.visitor_code', 'visitors.visitor_id', 'visitors.visitor_meet_person_name', 'visitors.visitor_purpose', 'visitors.visitor_enter_time', 'visitors.visitor_out_time', 'visitors.visitor_status', 'users.name', 'visitors.id']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('visitor_status', function($row){
                    if($row->visitor_status == 'In')
                    {
                        return '<span class="badge bg-success">Checked In</span>';
                    }elseif($row->visitor_status == 'Lobby'){
                        return '<span class="badge bg-secondary">At Waiting Area</span>';
                    }elseif($row->visitor_status == 'Pending'){
                        return '<span class="badge bg-secondary">Pending</span>';
                    }elseif($row->visitor_status == 'Rejected'){
                        return '<span class="badge bg-danger">Rejected</span>';
                    }else{
                        return '<span class="badge bg-info">Checked Out</span>';
                    }
                })
                ->escapeColumns('visitor_status')
                ->addColumn('action', function($row){
                    if($row->visitor_status == 'In' )
                    {
                        return  '<a href="/visitor/out/'.$row->id.'" class="btn btn-info btn-sm">Check-Out</a>
                        ';
                    }elseif($row->visitor_status == 'Lobby' ){
                        return '<a href="/visitor/in/'.$row->id.'" class="btn btn-success btn-sm">Accept</a>&nbsp;<a href="/visitor/rejected/'.$row->id.'" class="btn btn-danger btn-sm">Reject</a>
                        ';
                    }elseif($row->visitor_status == 'Rejected' ){
                        return '<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    }elseif($row->visitor_status == 'Pending' ){
                        return '';
                    }
                    else
                    {
                        return '';
                    }
                })
                ->addColumn('arrival', function($row){
                    if($row->visitor_status == 'Pending' )
                    {
                        return  '<a href="/visitor/arrive/'.$row->id.'" class="btn btn-info btn-sm">Yes</a>
                        ';
                    }
                    else
                    {
                        return '';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
                
        }
    }
    function add()
    {
        return view('add_visitor');
    }

    function add_validation(Request $request)
    {
        $request->validate([

            'visitor_purpose'      =>  'required',
            'visitor_firstname'      =>  'required',
            'visitor_lastname'      =>  'required',
            
        ]);

        $data = $request->all();


        Visitor::create([
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
        $data = Visitor::findOrFail($id);

        $data->delete();

        return redirect('visitor')->with('success', 'Visitor Removed');
    }

   
    


   
    function rejected($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(
           
            'visitor_status'          =>   'rejected',
            
        
           
        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Rejected');
    }

    function arrive($id)
    {
        $data = Visitor::findOrFail($id);
      
        $form_data = array(
           
            'visitor_status'          =>   'Lobby',
        
           
        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Arrived');
    }

    function in($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(
           
            'visitor_status'          =>   'In',
            'visitor_enter_time'        =>    $currentTime,
        
           
        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Checked In');
    }
    function out($id)
    {
        $data = Visitor::findOrFail($id);
        $currentTime = Carbon::now("Asia/Manila");
        $form_data = array(
           
            'visitor_status'          =>   'Out',
            'visitor_out_time'        =>    $currentTime,
        
           
        );
        Visitor::whereId($id)->update($form_data);

        return redirect('visitor')->with('success', 'Visitor Checked Out');
    }

}


