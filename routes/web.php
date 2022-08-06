
<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            // grades
            Route::get('/grades', [GradeController::class, 'index'])->name('grade.index');
            Route::post('/grades/store', [GradeController::class, 'storeGrade'])->name('grade.store');
            Route::Patch('/grades/update/{grade}', [GradeController::class, 'updateGrade'])->name('grade.update');
            Route::delete('/grades/delete/{grade}', [GradeController::class, 'deleteGrade'])->name('grade.delete');
            // Levels
            Route::get('/levels', [LevelController::class, 'index'])->name('level.index');
            Route::post('/levels/store', [LevelController::class, 'storeLevel'])->name('level.store');
            Route::PATCH('/levels/update/{level}', [LevelController::class, 'updateLevel'])->name('level.update');
            Route::DELETE('/levels/delete/{level}', [LevelController::class, 'deleteLevel'])->name('level.delete');
            Route::post('/levels/deleteLevels/', [LevelController::class, 'deleteAll'])->name('level.deleteAll');
            // classrooms
            Route::get('/classrooms', [ClassRoomController::class, 'index'])->name('classroom.index');
            Route::post('/classrooms/store', [ClassRoomController::class, 'storeClassroom'])->name('classroom.store');
            Route::PATCH('/classrooms/update/{classRoom}', [ClassRoomController::class, 'updateClassroom'])->name('classroom.update');
            Route::delete('/classrooms/delete/{classRoom}', [ClassRoomController::class, 'deleteClassroom'])->name('classroom.delete');
            // Parent
            Route::get('/parent/create', [StudentParentController::class, 'addParent'])->name('parent.create');
            //  teachers
            Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');
            Route::post('/teachers/store', [TeacherController::class, 'storeTeacher'])->name('teacher.store');
            Route::PATCH('/teachers/update/{teacher}', [TeacherController::class, 'updateTeacher'])->name('teacher.update');
            Route::DELETE('/teachers/delete/{teacher}', [TeacherController::class, 'deleteTeacher'])->name('teacher.delete');
            // students
            Route::get('students', [StudentController::class, 'index'])->name('student.index');
            Route::post('students/store', [StudentController::class, 'store'])->name('student.store');
            Route::PATCH('students/update/{student}', [StudentController::class, 'update'])->name('student.update');
            Route::get('/students/upgrade', [StudentController::class, 'upgradeStudents'])->name('student.upgrade_view');
            Route::DELETE('students/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
            Route::get('students/{student}', [StudentController::class, 'show'])->name('student.show');
        });
        Auth::routes();
    }
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
