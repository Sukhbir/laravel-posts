<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmailController; 
use App\Http\Controllers\UserStatusController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\FrontendController; 
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();



Route::get('admin', [AdminController::class, 'admin']);
Route::get('/student/post', [AdminController::class, 'test'])->name('student/post');


Route::get('frontend/error', [AdminController::class, 'error']);

// Route::get('/login', [AdminController::class, 'index'])->name('login');
// Route::post('/login', [AdminController::class, 'login'])->name('login');



Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post("/logout",[LoginController::class,"store"])->name("logout");

Route::get('frontend', [FrontendController::class, 'index']);

//Route::resource('student',StudenttestController::class);
Route::get('student', [StudentController::class, 'index'])->name('student.index');
//Route::get('student', [StudentController::class, 'index']);
Route::post('student', [StudentController::class, 'store'])->name('student.store');
Route::get('student/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::post('student/update', [StudentController::class, 'update'])->name('student.update');

Route::get('student/student/{id}/delete', [StudentController::class, 'destroy'])->name('student.delete');

Route::post('checkEmail', [EmailController::class, 'checkEmail'])->name('checkEmail');

Route::get('userChangeStatus', [UserStatusController::class, 'userChangeStatus'])->name('student.userChangeStatus');

//Route::get('userChangeStatus', 'UserStatusController@userChangeStatus'); 

// Route::group(['middleware' => 'disable_back_btn'], function () {
//     Route::group(['middleware' => 'authCheck'], function () {
//         Route::get('/student/post', [AdminController::class, 'test'])->name('student/post');
//         Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//     });
// });




?>



