<?php



// use App\Http\Contollers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\Teacher\ClassController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\ChapterController;
use App\Http\Controllers\Teacher\SubjectController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Teacher\QuestionController;
use App\Http\Controllers\Teacher\CreatePaperController;
use App\Http\Controllers\Teacher\TeacherProfileController;



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

Route::get('/', function () {
    return view('home.home');
});


//  Route::get('/admin',[DashboardController::class, 'index'])->name('admin.dashboard')->middleware('role:teacher');
Route::get('/home',[HomeController::class, 'index'])->name('home');


Route::get('/signup',[RegisterController::class, 'register'])->name('register');
Route::post('/signup',[RegisterController::class, 'registerpost']);

Route::get('/login',[LoginController::class, 'login'])->name('login');     
Route::post('/login',[LoginController::class, 'loginpost']);           

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

// Route::get('/viewaccount',[UserController::class, 'manageaccount']);
Route::get('/user/edit/{id}',[UserController::class,'edit']);
Route::post('/user/update/{id}',[UserController::class,'update']);





Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admindashboard',[DashboardController::class, 'index'])->name('admindashboard');
    Route::delete('/user/delete/{id}',[DashboardController::class,'destroy'])->name('user.delete');

});

Route::group(['middleware' => ['role:teacher']], function () {
    Route::get('/teacherdashboard', [TeacherController::class, 'index'])->name('teacherdashboard');

    Route::get('/class',[ClassController::class, 'index']);
Route::post('/class',[ClassController::class, 'store']);

Route::get('/subject',[SubjectController::class, 'create']);
Route::post('/subject',[SubjectController::class, 'store']);

Route::get('/chapter',[ChapterController::class, 'create']);
Route::post('/chapter',[ChapterController::class, 'store']);

Route::get('/question',[QuestionController::class, 'create']);
Route::post('/question',[QuestionController::class, 'store']);

Route::get('/paperview',[QuestionController::class, 'questionview']);

Route::get('/select',[CreatePaperController::class,'selectform']);
Route::post('/show',[CreatePaperController::class,'fetch'])->name('show ');
Route::post ('/pdf',[CreatePaperController::class,'generatepdf']);


Route::post('/savethispaper',[CreatePaperController::class,'save']); 
Route::get('/paperslist',[CreatePaperController::class,'savedpaper'])->name('paperslist');

Route::get('/viewpaper/{paper_id}',[CreatePaperController::class,'viewp']);
Route::delete('/delete/{paper_id}',[CreatePaperController::class,'destroy']);

                            ///////////////create Teacher Profile//////////////////////////////


Route::get('/createprofile',[TeacherProfileController::class,'profile']); 
Route::post('/createprofile',[TeacherProfileController::class,'store']);     

Route::get('/singledetailpage',[TeacherProfileController::class,'singlepage'])->name('singledetailpage');                            
    

Route::get('/viewsinglepage/{teacher_id}',[TeacherProfileController::class,'viewsingleprofile']);   
Route::get('/viewcv',[TeacherProfileController::class,'viewcv'])->name('viewcv');
Route::get('/edit/{teacher_id}',[TeacherProfileController::class,'edit']); 
Route::post('/update/{teacher_id}',[TeacherProfileController::class,'update']); 



Route::delete('/profile/delete/{teacher_id}',[TeacherProfileController::class,'destroy'])->name('profile.delete');
Route::get('/get-subjects/{year_id}',[CreatePaperController::class,'getSubjects']); 
Route::get('/get-chapters/{subject_id}',[CreatePaperController::class,'getchapters']); 

Route::get('userquestions',[CreatePaperController::class,'userquestions']);
Route::post('userquestions',[CreatePaperController::class,'viewquestions']);


});

Route::group(['middleware' => ['role:student']], function () {
    Route::get('/studentdashboard', [StudentController::class, 'index'])->name('studentdashboard');
    Route::get('/listofteacher',[StudentController::class,'list'])->name('listofteacher');
    Route::post('/mark/{teacher_id}',[StudentController::class,'markteacher']); 
    Route::post('/rating/{id}/{teacher_id}',[StudentController::class,'rating']);  
    Route::get('/viewsinglepage/{teacher_id}',[TeacherProfileController::class,'viewsingleprofile']);   


});

                          ///////////////Create Paper//////////////////////////










                           






















