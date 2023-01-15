<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Models\Visitor;
use App\Models\Visitdetail;
use App\Models\Register;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function custom_login(Request $request)
    {
        $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential))
        {
            return redirect()->intended('dashboard')->withSuccess('You have successfully been logged in');
        }

        return redirect('login')->with('error', '"The email address or password is incorrect. Please retry..." ');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function custom_registration(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'      =>  $data['name'],
            'email'     =>  $data['email'],
            'password'  =>  Hash::make($data['password']),
            'type'      =>  'Admin'
        ]);

        return redirect('registration')->with('success', 'Registration Complete');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
           
            $visitorin = Visitor::where('visitor_status', '=', 'Lobby')->where('visitor_meet_person_name', '=', Auth::user()->id)->count();
            $visitorout = Visitor::where('visitor_status', '=', 'Out')->where('visitor_meet_person_name', '=', Auth::user()->id)->count();
            $register = Visitor::where('visitor_meet_person_name', '=', Auth::user()->id)->count();
            $checkin = Visitor::where('visitor_status', '=', 'In')->count();
            $checkout = Visitor::where('visitor_status', '=', 'Out')->count();
            $pending = Visitor::where('visitor_status', '=', 'Pending')->count();
          

            //Admin
            $user = User::where('type', '=', 'User')->where('status', '=', 'Active')->count();
            $visitor = Visitor::count();
            $preregister = Register::count();
         
          
            
            return view('dashboardmain')->with("user", $user)->with("visitor", $visitor)->with("visitorin", $visitorin)
            ->with("visitorout", $visitorout)->with("register", $register)->with("checkin", $checkin)
            ->with("checkout", $checkout)->with("pending", $pending)->with("preregister", $preregister);
        }

        return redirect('login');
    }

    public function dashboard2()
    {
        if(Auth::check())
        {
           
            $visitorin = Visitor::where('visitor_status', '=', 'Lobby')->where('visitor_meet_person_name', '=', Auth::user()->id)->count();
            $visitorout = Visitor::where('visitor_status', '=', 'Out')->where('visitor_meet_person_name', '=', Auth::user()->id)->count();
            $register = Visitor::where('visitor_meet_person_name', '=', Auth::user()->id)->count();

            $user = User::where('type', '=', 'User')->where('status', '=', 'Active')->count();
            $visitor = Visitor::count();
            
            return view('dashboard')->with("user", $user)->with("visitor", $visitor)->with("visitorin", $visitorin)
            ->with("visitorout", $visitorout)->with("register", $register);
        }

        return redirect('login');
    }


     public function home(){
   
        return view('frontend/home');
        
        }

        
    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('success', 'You have successfully been logged out');
        
    }
    
    function checkin()
    {
        $user['data'] = User::orderby("name","asc")->where('type', '=', 'User')->where('status', '=', 'Active')
        ->select('id','name')
        ->get();
        
     
        //output: INV-000001
        return view('frontend/checkin')->with("user",$user);
    }

    function checkid()
    {
        
        $visitor = Session::get('data');

        return view('frontend/checkin_two')->with("visitor", $visitor);
      
    }
    function preregister()
    {

        return view('frontend/pre_register');
    }
    function return()
    {

        return view('frontend/return');
    }

    function checkin_validation(Request $request)
    {
        $request->validate([

            'visitor_purpose'      =>  'required',
            'visitor_firstname'    =>  'required',
            'visitor_lastname'     =>  'required',
            'visitor_email'        =>  'required|email|unique:visitdetails',
            'visitor_mobile_no'    =>  'required',
            'visitor_gender'       =>  'required',
            'visitor_address'      =>  'required',
            'visitor_id'           =>  'required',
            'visitor_meet_person_name'      =>  'required',
            'visit_time'           =>  'required',
            
            
        ]);

        $data = $request->all();

        $visitor_code= IdGenerator::generate(['table' => 'visitors', 'field' => 'visitor_code', 'length' => 12, 'prefix' =>'EVPASS-']);

        $visitor = Visitor::create([
            'visitor_code'           =>   $visitor_code,
            'visitor_firstname'      =>  $data['visitor_firstname'],
            'visitor_lastname'       =>  $data['visitor_lastname'],
            'visitor_email'          =>  $data['visitor_email'],
            'visitor_mobile_no'      =>  $data['visitor_mobile_no'],
            'visitor_gender'         =>  $data['visitor_gender'],
            'visitor_address'        =>  $data['visitor_address'],
            'visitor_id'             =>  $data['visitor_id'],
            'visitor_meet_person_name'  =>  $data['visitor_meet_person_name'],
            'visitor_purpose'        =>  $data['visitor_purpose'],
            'visitor_status'         =>  'Pending',
            'visitor_enter_by'       =>    $data['visitor_enter_by'],
            'visit_time'             =>    $data['visit_time'],
          
        ]);
       
        Visitdetail::create([
            'visitor_firstname'      =>  $data['visitor_firstname'],
            'visitor_lastname'       =>  $data['visitor_lastname'],
            'visitor_email'          =>  $data['visitor_email'],
            'visitor_mobile_no'      =>  $data['visitor_mobile_no'],
            'visitor_gender'         =>  $data['visitor_gender'],
            'visitor_address'        =>  $data['visitor_address'],
            'visitor_id'             =>  $data['visitor_id'],
            'visitor_enter_by'       =>  $data['visitor_enter_by'],
          
        ]);

        return redirect('checkin-id')->with(['success'=>'','data'=>$visitor]) ;
    }

    function search(Request $request)
    {
        $request->validate([
            'query' => 'exists:registers,register_email',
        ],[
            'query.exists' => '   Pre-Register not found!',
        ]
        );

        $search_text = $_GET['query'];
        $register = Register::where('register_email', 'LIKE', '%' . $search_text . '%')->get();
        $user['data'] = User::orderby("name","asc")->where('type', '=', 'User')->where('status', '=', 'Active')
        ->select('id','name')
        ->get();
       
        return view('frontend/checkin_register',compact('register'))->with("user",$user)->with("register",$register);
    }

    function checkin_register()
    {

        return view('frontend/checkin_register');
    }
   
}
