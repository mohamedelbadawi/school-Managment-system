
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentParentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UpgradeController;
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
            Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
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
            Route::DELETE('students/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
            Route::get('students/{student}', [StudentController::class, 'show'])->name('student.show');
            //    upgrades
            Route::get('upgrades/', [UpgradeController::class, 'index'])->name('upgrade.index');
            Route::get('upgrades/classroom', [UpgradeController::class, 'graduateClassroom'])->name('upgrade.graduate_view');
            Route::post('upgrades/classroom', [UpgradeController::class, 'storeGraduationClassroom'])->name('upgrade.graduate');
            Route::DELETE('upgrades/delete/{upgrade}', [UpgradeController::class, 'delete'])->name('upgrade.delete');
            Route::get('/upgrades/upgradeStudent', [UpgradeController::class, 'upgradeStudent'])->name('upgrade.upgrade_student');
            Route::get('/upgrades/graduatedStudents', [UpgradeController::class, 'graduatedStudents'])->name('upgrade.graduated');
            // expense
            Route::get('expenses', [ExpenseController::class, 'index'])->name('expense.index');
            Route::post('expenses/store', [ExpenseController::class, 'storeExpense'])->name('expense.store');
            Route::post('expenses/update/{expense}', [ExpenseController::class, 'updateExpense'])->name('expense.update');
            Route::DELETE('expenses/delete/{expense}', [ExpenseController::class, 'deleteExpense'])->name('expense.delete');
            // invoices
            Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice.index');
            Route::get('/invoices/addInvoice/{student}', [InvoiceController::class, 'createInvoice'])->name('invoice.create');
            Route::post('/invoices/storeInvoice/{student}', [InvoiceController::class, 'storeInvoice'])->name('invoice.store');
            //  payments
            Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
            Route::get('/payments/create/{student}', [PaymentController::class, 'create'])->name('payment.create');
            Route::post('/payments/store/{student}', [PaymentController::class, 'store'])->name('payment.store');
            Route::get('/receipt/{payment}', [PaymentController::class, 'getReceipt'])->name('payment.receipt');
            // subjects
            Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
            Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subject.store');
            Route::delete('/subjects/delete/{subject}', [SubjectController::class, 'delete'])->name('subject.delete');
            Route::PATCH('/subjects/update/{subject}', [SubjectController::class, 'update'])->name('subject.update');
        });
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        // Auth::routes(['register']);
        // auth
        Route::get('login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
        Route::post('login/', [LoginController::class, 'login'])->middleware('guest')->name('login');
    }
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('guest')->name('selection');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
