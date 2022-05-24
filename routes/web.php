<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeDepartmentController;
use App\Http\Controllers\EmployeeDesignationController;
use App\Http\Controllers\EmployeeShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\EmployeeClaimController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\MonthlySalaryController;
use App\Http\Controllers\AttendanceReport;
use App\Http\Controllers\FeedbackController;


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
    return view('auth.login');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts.admin.admin_index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'Logout']) -> name('admin.logout');

Route::group(['middleware' => 'auth'], function(){

// User Management All Routes
Route::prefix('user') -> group(function(){
    Route::get('/view', [AdminController::class, 'ViewUsers']) -> name('users.view');
    Route::get('/add', [AdminController::class, 'AddUsers']) -> name('users.add');
    Route::post('/store', [AdminController::class, 'StoreUsers']) -> name('users.store');
    Route::get('/edit/{id}', [AdminController::class, 'EditUsers']) -> name('users.edit');
    Route::post('/update/{id}', [AdminController::class, 'UpdateUsers']) -> name('users.update');
    Route::get('/delete/{id}', [AdminController::class, 'DeleteUsers']) -> name('users.delete');
    });

// Setup
Route::prefix('setups') -> group(function(){
    Route::get('employee/department/view', [EmployeeDepartmentController::class, 'ViewDepartment']) -> name('employee.department.view');
    Route::get('employee/department/add', [EmployeeDepartmentController::class, 'AddDepartment']) -> name('employee.department.add');
    Route::post('employee/department/store', [EmployeeDepartmentController::class, 'StoreDepartment']) -> name('store.employee.department');
    Route::get('employee/department/edit/{id}', [EmployeeDepartmentController::class, 'EditDepartment']) -> name('employee.department.edit');
    Route::post('employee/department/update{id}', [EmployeeDepartmentController::class, 'UpdateDepartment']) -> name('update.employee.department');
    Route::get('employee/department/delete/{id}', [EmployeeDepartmentController::class, 'DeleteDepartment']) -> name('employee.department.delete');

// Designation
    Route::get('employee/designation/view', [EmployeeDesignationController::class, 'ViewDesignation']) -> name('employee.designation.view');
    Route::get('employee/designation/add', [EmployeeDesignationController::class, 'AddDesignation']) -> name('employee.designation.add');
    Route::post('employee/designation/store', [EmployeeDesignationController::class, 'StoreDesignation']) -> name('store.employee.designation');
    Route::get('employee/designation/edit/{id}', [EmployeeDesignationController::class, 'EditDesignation']) -> name('employee.designation.edit');
    Route::post('employee/designation/update{id}', [EmployeeDesignationController::class, 'UpdateDesignation']) -> name('update.employee.designation');
    Route::get('employee/designation/delete/{id}', [EmployeeDesignationController::class, 'DeleteDesignation']) -> name('employee.designation.delete');

//Shift
    Route::get('employee/shift/view', [EmployeeShiftController::class, 'ViewShift']) -> name('employee.shift.view');
    Route::get('employee/shift/add', [EmployeeShiftController::class, 'AddShift']) -> name('employee.shift.add');
    Route::post('employee/shift/store', [EmployeeShiftController::class, 'StoreShift']) -> name('store.employee.shift');
    Route::get('employee/shift/edit/{id}', [EmployeeShiftController::class, 'EditShift']) -> name('employee.shift.edit');
    Route::post('employee/shift/update{id}', [EmployeeShiftController::class, 'UpdateShift']) -> name('update.employee.shift');
    Route::get('employee/shift/delete/{id}', [EmployeeShiftController::class, 'DeleteShift']) -> name('employee.shift.delete');
});

Route::prefix('workers') -> group(function(){
// Employee Registration and Add
    Route::get('register/employee/view', [EmployeeController::class, 'ViewEmployee']) -> name('employee.registration.view');
    Route::get('/register/employee/add', [EmployeeController::class, 'AddEmployee']) -> name('employee.registration.add');
    Route::post('/register/employee/store', [EmployeeController::class, 'StoreEmployee']) -> name('store.employee.registration');
    // Route::get('/department/year/wise', [EmployeeRegistrationController::class, 'EmployeeDepartmentYearWise']) -> name('employee.department.year.wise');
    Route::get('/register/employee/edit/{employee_id}', [EmployeeController::class, 'EditEmployee']) -> name('employee.registration.edit');
    Route::post('/register/employee/update/{employee_id}', [EmployeeController::class, 'UpdateEmployee']) -> name('update.employee.registration');
    Route::get('/register/employee/details/{employee_id}', [EmployeeController::class, 'EmployeeDetails']) -> name('employee.registration.details');
    Route::get('register/delete/{employee_id}', [EmployeeController::class, 'DeleteEmployee']) -> name('employee.registration.delete');

// View Employee for Employee
    Route::get('view/employee', [EmployeeController::class, 'ViewEmployeeForEmployee']) -> name('employee.view');
});

Route::prefix('salary') -> group(function(){
// Employee Salary
    Route::get('employee/view', [EmployeeSalaryController::class, 'ViewSalary']) -> name('employee.salary.view');
    Route::get('employee/increment/{employee_id}', [EmployeeSalaryController::class, 'SalaryIncrement']) -> name('employee.salary.increment');
    Route::post('employee/store/{employee_id}', [EmployeeSalaryController::class, 'StoreSalary']) -> name('update.increment.store');
    Route::get('employee/details/{employee_id}', [EmployeeSalaryController::class, 'SalaryDetails']) -> name('employee.salary.details');

// Employee Monthly Salary
    Route::get('employee/monthly/view', [MonthlySalaryController::class, 'ViewMonthlySalary']) -> name('employee.monthly.salary');
    Route::get('employee/monthly/get', [MonthlySalaryController::class, 'MonthlySalaryGet']) -> name('employee.monthly.salary.get');
    Route::get('employee/monthly/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPaySlip']) -> name('employee.monthly.salary.payslip');
});

Route::prefix('leave') -> group(function(){
// Employee Leave
    Route::get('employee/view', [EmployeeLeaveController::class, 'ViewLeave']) -> name('employee.leave.view');
    Route::get('employee/myleave', [EmployeeLeaveController::class, 'MyLeave']) -> name('employee.leave.myleave');
    Route::get('employee/apply', [EmployeeLeaveController::class, 'ApplyLeave']) -> name('employee.leave.apply');
    Route::post('employee/store/{id}', [EmployeeLeaveController::class, 'StoreLeave']) -> name('store.leave.application');
    Route::get('employee/delete/{employee_id}', [EmployeeLeaveController::class, 'DeleteLeave']) -> name('employee.leave.delete');

// Attendance 
    Route::get('employee/view', [EmployeeLeaveController::class, 'ViewLeave']) -> name('employee.attendance.view');

// Admin Employee Leave
    // Route::get('employee/viewall', [EmployeeLeaveController::class, 'ViewAllLeave']) -> name('employee.leave.viewall');
    Route::get('employee/view/status', [EmployeeLeaveController::class, 'ViewLeaveAdmin']) -> name('employee.leave.status');
    Route::post('employee/approve/{id}', [EmployeeLeaveController::class, 'ApproveLeave']) -> name('employee.approve_leave');
    Route::post('employee/decline/{id}', [EmployeeLeaveController::class, 'DeclineLeave']) -> name('employee.decline_leave');
});

Route::prefix('attendance') -> group(function(){
// Attemdance 
    Route::get('employee/view', [EmployeeAttendanceController::class, 'ViewAttendance']) -> name('employee.attendance.view');
    Route::get('employee/add', [EmployeeAttendanceController::class, 'AddAttendance']) -> name('employee.attendance.add');
    Route::post('employee/store', [EmployeeAttendanceController::class, 'StoreAttendance']) -> name('store.employee.attendance');
    Route::get('employee/edit/{date}', [EmployeeAttendanceController::class, 'EditAttendance']) -> name('employee.attendance.edit');
    Route::get('employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails']) -> name('employee.attendance.details');
});

Route::prefix('claim') -> group(function(){
// Employee Claims
        Route::get('employee/view', [EmployeeClaimController::class, 'ViewClaim']) -> name('employee.claim.view');
        Route::get('employee/myclaim', [EmployeeClaimController::class, 'MyClaim']) -> name('employee.claim.myclaim');
        Route::get('employee/apply', [EmployeeClaimController::class, 'ApplyClaim']) -> name('employee.claim.apply');
        Route::post('employee/store/{id}', [EmployeeClaimController::class, 'StoreClaim']) -> name('store.claim.application');
        Route::get('employee/delete/{employee_id}', [EmployeeClaimController::class, 'DeleteClaim']) -> name('employee.claim.delete');
    
// Admin Employee Claims
        Route::get('employee/viewall', [EmployeeClaimController::class, 'ViewAllClaim']) -> name('employee.claim.viewall');
        Route::get('employee/view/status', [EmployeeClaimController::class, 'ViewClaimAdmin']) -> name('employee.claim.status');
        Route::post('employee/approve/{employee_id}', [EmployeeClaimController::class, 'ApproveClaim']) -> name('employee.approve_claim');
        Route::post('employee/decline/{employee_id}', [EmployeeClaimController::class, 'DeclineClaim']) -> name('employee.decline_claim');
    });

Route::prefix('profile') -> group(function(){
    Route::get('/view', [ProfileController::class, 'ViewProfile']) -> name('profile.view');
    // Route::get('/view', [ProfileController::class, 'ViewProfile']) -> name('profile.view');
    // Route::get('/edit', [ProfileController::class, 'EditProfile']) -> name('profile.edit');
    // Route::post('/store', [ProfileController::class, 'StoreProfile']) -> name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'ViewPassword']) -> name('password.view');
    Route::post('/password/update', [ProfileController::class, 'UpdatePassword']) -> name('password.update');
});

// Attendance Report
Route::prefix('reports') -> group(function(){
    Route::get('attendance/view', [AttendanceReport::class, 'AttendanceReportView']) -> name('attendance.report.view');
    Route::get('attendance/get', [AttendanceReport::class, 'GetAttendanceReport']) -> name('report.attendance.get');
});

// Feedback 
Route::prefix('feedback') -> group(function(){
    Route::get('view', [FeedbackController::class, 'ViewFeedback']) -> name('employee.feedback.view');
    Route::get('write', [FeedbackController::class, 'WriteFeedback']) -> name('employee.feedback.write');
    Route::post('store/{employee_id}', [FeedbackController::class, 'StoreFeedback']) -> name('store.feedback');
    Route::get('delete/{employee_id}', [FeedbackController::class, 'DeleteFeedback']) -> name('employee.feedback.delete');
    
});

});