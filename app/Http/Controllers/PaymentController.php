<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePaymentRequest;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['student'])->get();
        return view('payment.index', compact('payments'));
    }

    public function create(Student $student)
    {

        return view('payment.add', compact('student'));
    }

    public function store(storePaymentRequest $request, Student $student)
    {
        try {
            Payment::create(['name' => $request->name, 'student_id' => $student->id, 'amount' => $request->amount]);
            $student->update(['debit' => $student->debit - $request->amount]);
            toastr()->success('installment have been paid successfully');
        } catch (\Throwable $th) {
            toastr()->success('some thing error');
        }
        return redirect()->route('payment.index');
    }


    public function getReceipt(Payment $payment)
    {
        $student = Student::findOrFail($payment->student_id);

        return view('payment.receipt', compact('student', 'payment'));
    }
}
