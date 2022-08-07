<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeExpenseRquest;
use App\Http\Requests\updateExpenseRquest;
use App\Models\Expense;
use App\Models\Grade;
use Illuminate\Http\Request;
use Nette\Schema\Expect;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['grade', 'level'])->get();
        $grades = Grade::all();
        return view('expense.index', compact('grades', 'expenses'));
    }

    public function storeExpense(storeExpenseRquest $request)
    {
        try {
            Expense::create([
                'title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
                'amount' => $request->amount,
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'year' => $request->year,
                'description' => $request->description
            ]);
            toastr()->success('expense created successfully');
        } catch (\Throwable $th) {
            toastr()->error('some thing error !');
        }
        return redirect()->route('expense.index');
    }


    public function updateExpense(updateExpenseRquest $request, Expense $expense)
    {
        try {
            $expense->update([
                'title' => ['ar' => $request->title_ar, 'en' => $request->title_en],
                'amount' => $request->amount,
                'grade_id' => $request->grade_id,
                'level_id' => $request->level_id,
                'year' => $request->year,
                'description' => $request->description
            ]);
            toastr()->success('expense updated successfully');
        } catch (\Throwable $th) {
            toastr()->error('some thing error !');
        }
        return redirect()->route('expense.index');
    }

    public function deleteExpense(Expense $expense)
    {
        try {
            $expense->delete();
            toastr()->success('expense delete successfully');
        } catch (\Throwable $th) {
            toastr()->error('some thing error !');
        }
        return redirect()->route('expense.index');
    }
}
