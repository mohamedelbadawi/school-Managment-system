<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeInvoiceRequest;
use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Student;
use App\Models\StudentAcount;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['grade', 'level', 'expense'])->get();

        return view('invoice.index', compact('invoices'));
    }

    public function createInvoice(Student $student)
    {
        $expenses = Expense::where('level_id', $student->level_id)->get();
        return view('invoice.add', compact('student', 'expenses'));
    }

    public function storeInvoice(storeInvoiceRequest $request, Student $student)
    {

        try {

            foreach ($request->invoices as $invoice) {

                $expense = Expense::where('id', $invoice['expense_id'])->first();

                Invoice::create([
                    'invoice_date' => now(), 'student_id' => $student->id, 'grade_id' => $student->grade_id, 'level_id' => $student->level_id,
                    'expense_id' => $invoice['expense_id'], 'amount' => $expense->amount, 'description' => $invoice['description'],
                ]);
                StudentAcount::create(['student_id' => $student->id, 'grade_id' => $student->grade_id, 'level_id' => $student->level_id, 'debit' => $expense->amount, 'credit' => 0.0]);
            }
            toastr()->success('invoice created successfully');
        } catch (\Throwable $th) {
            toastr()->success('something error');
        }
        return redirect()->route('invoice.index');
    }
}
