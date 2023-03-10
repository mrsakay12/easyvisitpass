<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    //return view('auth.registration');
    return view('auth.login');
});

//Front End Route
Route::get('home', [CustomAuthController::class, 'home'])->name('home');
Route::get('checkin', [CustomAuthController::class, 'checkin'])->name('checkin');
Route::get('checkin-id', [CustomAuthController::class, 'checkid'])->name('checkid');
Route::get('preregister', [CustomAuthController::class, 'preregister'])->name('preregister');
Route::get('return', [CustomAuthController::class, 'return'])->name('return');
Route::post('checkin/checkin_validation', [CustomAuthController::class, 'checkin_validation'])->name('checkin_validation');

Route::get('search', [CustomAuthController::class, 'search'])->name('search');
Route::get('checkin_register', [CustomAuthController::class, 'checkin_register'])->name('checkin_register');


Route::get('search2', [CustomAuthController::class, 'search2'])->name('search2');
Route::get('checkin_return', [CustomAuthController::class, 'checkin_return'])->name('checkin_return');
Route::post('checkin/return_validation', [CustomAuthController::class, 'return_validation'])->name('return_validation');







Route::get('registration', [CustomAuthController::class, 'registration'])->name('register');

Route::post('custom-registration', [CustomAuthController::class, 'custom_registration'])->name('register.custom');

Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'custom_login'])->name('login.custom');

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('dash', [CustomAuthController::class, 'dash'])->name('dash');

Route::redirect('/', '/home')->name('home');



Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');



Route::post('profile/edit_validation', [ProfileController::class, 'edit_validation'])->name('profile.edit_validation');
Route::get('company', [ProfileController::class, 'company'])->name('company');
Route::post('company/edit_validation', [ProfileController::class, 'company_validation'])->name('profile.company_validation');





Route::post('employee/edit_validation', [EmployeeController::class, 'edit_validation'])->name('employee.edit_validation');
Route::post('employee/edit_empvalidation', [EmployeeController::class, 'edit_empvalidation'])->name('employee.edit_empvalidation');
Route::get('employee/add', [EmployeeController::class, 'add'])->name('add');
Route::post('employee/add_validation', [EmployeeController::class, 'add_validation'])->name('employee.add_validation');


Route::get('/getDept/{id}', [EmployeeController::class, 'getDept']);







Route::get('sub_user', [SubUserController::class, 'index'])->name('sub_user');

Route::get('sub_user/fetchall', [SubUserController::class, 'fetch_all'])->name('sub_user.fetchall');

Route::get('sub_user/add', [SubUserController::class, 'add'])->name('sub_user.add');

Route::post('sub_user/add_validation', [SubUserController::class, 'add_validation'])->name('sub_user.add_validation');

Route::get('sub_user/edit/{id}', [SubUserController::class, 'edit'])->name('edit');

Route::post('sub_user/edit_validation', [SubUserController::class, 'edit_validation'])->name('sub_user.edit_validation');

Route::get('sub_user/delete/{id}', [SubUserController::class, 'delete'])->name('delete');

Route::get('department', [DepartmentController::class, 'index'])->name('department');

Route::get('department/fetch_all', [DepartmentController::class, 'fetch_all'])->name('department.fetch_all');

Route::get('department/add', [DepartmentController::class, 'add'])->name('add');

Route::post('department/add_validation', [DepartmentController::class, 'add_validation'])->name('department.add_validation');

Route::get('department/edit/{id}', [DepartmentController::class, 'edit'])->name('edit');

Route::post('department/edit_validation', [DepartmentController::class, 'edit_validation'])->name('department.edit_validation');

Route::get('department/delete/{id}', [DepartmentController::class, 'delete'])->name('delete');


//Visitors

Route::get('visitor', [VisitorController::class, 'index'])->name('visitor');
Route::get('visitor/fetchall', [VisitorController::class, 'fetch_all'])->name('visitor.fetchall');
Route::get('visitor/fetch_allUser', [VisitorController::class, 'fetch_allUser'])->name('visitor.fetch_allUser');
Route::get('visitor/fetch_allrecep', [VisitorController::class, 'fetch_allrecep'])->name('visitor.fetch_allrecep');



Route::get('visitor/add', [VisitorController::class, 'add'])->name('visitor.add');
Route::post('visitor/add_validation', [VisitorController::class, 'add_validation'])->name('visitor.add_validation');

Route::post('visitor/edit_validation', [VisitorController::class, 'edit_validation'])->name('visitor.edit_validation');
Route::get('visitor/delete/{id}', [VisitorController::class, 'delete'])->name('delete');




Route::get('visitorimage', [VisitorController::class, 'visitorimage'])->name('visitorimage');
Route::get('employeeview1', [VisitorController::class, 'employeeview1'])->name('employeeview1');
Route::get('visitor/edit/{id}', [VisitorController::class, 'edit'])->name('edit');
Route::get('employeeview/edit/{id}', [VisitorController::class, 'employeeview'])->name('employeeview');
Route::get('checkoutview/{id}', [VisitorController::class, 'checkoutview'])->name('checkoutview');





//In out 
Route::get('visitor/in/{id}', [VisitorController::class, 'in'])->name('in');
Route::get('visitor/out/{id}', [VisitorController::class, 'out'])->name('out');
Route::get('visitor/rejected/{id}', [VisitorController::class, 'rejected'])->name('rejected');
Route::get('visitor/arrive/{id}', [VisitorController::class, 'arrive'])->name('arrive');
Route::get('visitor/reschedule/{id}', [VisitorController::class, 'reschedule'])->name('reschedule');





//Designations

Route::get('designation', [DesignationController::class, 'index'])->name('designation');
Route::get('designation/fetch_all', [DesignationController::class, 'fetch_all'])->name('designation.fetch_all');
Route::get('designation/add', [DesignationController::class, 'add'])->name('add');
Route::post('designation/add_validation', [DesignationController::class, 'add_validation'])->name('designation.add_validation');
Route::get('designation/edit/{id}', [DesignationController::class, 'edit'])->name('edit');
Route::post('designation/edit_validation', [DesignationController::class, 'edit_validation'])->name('designation.edit_validation');
Route::get('designation/delete/{id}', [DesignationController::class, 'delete'])->name('delete');

//Designations

//Visitors

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::get('register/fetchall', [RegisterController::class, 'fetch_all'])->name('register.fetchall');
Route::get('register/add', [RegisterController::class, 'add'])->name('register.add');
Route::post('register/add_validation', [RegisterController::class, 'add_validation'])->name('register.add_validation');
Route::get('register/edit/{id}', [RegisterController::class, 'edit'])->name('edit');
Route::post('register/edit_validation', [RegisterController::class, 'edit_validation'])->name('register.edit_validation');
Route::get('register/delete/{id}', [RegisterController::class, 'delete'])->name('delete');




