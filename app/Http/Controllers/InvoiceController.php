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
        $expenses = Expense::all();
        $types = Invoice::TYPES;


        return view('invoice.index', compact('invoices', 'expenses', 'types'));
    }

    public function createInvoice(Student $student)
    {
        $types = Invoice::TYPES;
        $expenses = Expense::where('level_id', $student->level_id)->get();
        return view('invoice.add', compact('student', 'expenses', 'types'));
    }

    public function storeInvoice(storeInvoiceRequest $request, Student $student)
    {

        try {

            foreach ($request->invoices as $invoice) {

                $expense = Expense::where('id', $invoice['expense_id'])->first();

                Invoice::create([
                    'student_id' => $student->id,
                    'expense_id' => $invoice['expense_id'], 'amount' => $expense->amount, 'description' => $invoice['description'],
                ]);
                $student->update(['debit' => $student->debit + $expense->amount]);
            }
            toastr()->success('invoice created successfully');
        } catch (\Throwable $th) {
            toastr()->success('something error');
        }
        return redirect()->route('invoice.index');
    }

    public function updateInvoice(Request $request, Invoice $invoice, StudentAcount $studentAcount)
    {
        $expense = Expense::where('id', $invoice['expense_id'])->first();


        $invoice->update(['description' => $request->description, 'expense_id' => $request->expense_id, 'amount' => $expense->amount]);
    }
}
