<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\AssignController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class, 'login']);


Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::get('about', [UserController::class, 'about'])->name('about');
Route::get('home', [UserController::class, 'home'])->name('home');
Route::get('forgetpassword', [UserController::class, 'forgetpassword'])->name('forgetpassword');
Route::get('resetpassword', [UserController::class, 'resetpassword'])->name('resetpassword');
Route::get('admindashboard', [UserController::class, 'admindashboard'])->name('admindashboard');
Route::get('managerdashboard', [UserController::class, 'managerdashboard'])->name('managerdashboard');
Route::get('employeedashboard', [UserController::class, 'employeedashboard'])->name('employeedashboard');
Route::get('profileview/{id}', [UserController::class, 'profileview'])->name('profileview');
Route::get('profileupdate/{id}', [UserController::class, 'profile'])->name('profileupdate');
Route::get('createemployee', [UserController::class, 'createemployee'])->name('createemployee');
Route::get('createmanager', [UserController::class, 'createmanager'])->name('createmanager');
Route::get('managerupdate', [UserController::class, 'managerupdate'])->name('managerupdate');
Route::get('employeeupdate', [UserController::class, 'employeeupdate'])->name('employeeupdate');
Route::get('createdepartment', [UserController::class, 'createdepartment'])->name('createdepartment');
Route::get('departmentupdate', [UserController::class, 'departmentupdate'])->name('departmentupdate');
Route::get('createplan', [UserController::class, 'createplan'])->name('createplan');
Route::get('planupdate', [UserController::class, 'planupdate'])->name('planupdate');
Route::get('createproject', [UserController::class, 'createproject'])->name('createproject');
Route::get('createtasks', [UserController::class, 'createtasks'])->name('createtasks');
Route::get('projectupdate', [UserController::class, 'projectupdate'])->name('projectupdate');
Route::get('tasksupdate', [UserController::class, 'tasksupdate'])->name('tasksupdate');
Route::get('assigntasks', [UserController::class, 'assigntasks'])->name('assigntasks');
Route::get('assigntasksview/{id}', [UserController::class, 'assigntasksview'])->name('assigntasksview');
Route::get('addtimeslot/{id}', [UserController::class, 'addtimeslot'])->name('addtimeslot');
Route::get('viewtimeslot/{id}', [UserController::class, 'viewtimeslot'])->name('viewtimeslot');
Route::get('projectreport', [UserController::class, 'projectreport'])->name('projectreport');
Route::get('employeereport', [UserController::class, 'employeereport'])->name('employeereport');
Route::get('employeereportown', [UserController::class, 'employeereportown'])->name('employeereportown');

Route::post('/profileupdate/{id}', [UserController::class, 'profileupdate']);
Route::get('/employeeupdate/delete/{id}',[UserController::class, 'delete']);
Route::get('/managerupdate/delete/{id}',[UserController::class, 'delete']);
Route::get('viewemployee/{id}', [UserController::class, 'viewemployee'])->name('viewemployee');
Route::get('viewmanager/{id}', [UserController::class, 'viewmanager'])->name('viewmanager');


Route::post('/register', [RegistrationController::class, 'register']);
Route::post('/login', [RegistrationController::class, 'login']);
Route::post('/forgetpassword', [RegistrationController::class, 'forgetpassword']);
Route::post('/resetpassword', [RegistrationController::class, 'resetpassword']);

Route::post('/createproject',[ProjectController::class, 'createproject']);
Route::get('/projectupdate/delete/{id}',[ProjectController::class, 'delete']);
Route::get('viewproject/{id}', [ProjectController::class, 'project'])->name('viewproject');
Route::get('editproject/{id}',[ProjectController::class,'project2'])->name('editproject');
Route::post('/editproject/{id}', [ProjectController::class, 'editproject']);

Route::post('/createtasks',[TasksController::class, 'createtasks']);
Route::get('/tasksupdate/delete/{id}',[TasksController::class, 'delete']);
Route::get('viewtasks/{id}', [TasksController::class, 'task'])->name('viewtasks');
Route::get('edittasks/{id}',[TasksController::class,'task2'])->name('edittasks');
Route::post('/edittasks/{id}', [TasksController::class, 'edittasks']);



Route::post('/createdepartment',[DepartmentController::class, 'createdepartment']);
Route::get('/departmentupdate/delete/{id}',[DepartmentController::class, 'delete']);
Route::get('viewdepartment/{id}', [DepartmentController::class, 'department'])->name('viewdepartment');
Route::get('editdepartment/{id}',[DepartmentController::class,'department2'])->name('editdepartment');
Route::post('/editdepartment/{id}', [DepartmentController::class, 'editdepartment']);


Route::post('/assigntasks',[AssignController::class, 'assigntasks']);


Route::post('/addtimeslot',[AllocationController::class, 'allocation']);

Route::get('/events', [EventController::class, 'index']);
Route::post('/addEvent', [EventController::class, 'store']);

Route::post('projectreportpdf',[PdfController::class,'projectreportpdf'])->name('projectreportpdf');