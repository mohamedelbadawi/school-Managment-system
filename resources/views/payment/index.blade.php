@extends('layouts.master')

@section('title')
    payments
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="" class="table datatable table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr class="alert-success">
                                                <th>#</th>
                                                <th>payer</th>
                                                <th>student name</th>
                                                <th>amount</th>
                                                <th>paid at</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payment->name }}</td>
                                                    <td>{{ $payment->student->name }}</td>
                                                    <td>{{ $payment->amount }}</td>

                                                    <td>{{ $payment->created_at->diffForHumans() }}</td>

                                                    {{-- <td>{{ $payem->description ? $invoice->description : '-' }}</td> --}}
                                                    <td>
                                                        <button data-toggle="modal"
                                                            data-target="#editModal-{{ $payment->id }}"
                                                            class="btn btn-info btn-sm" role="button"
                                                            aria-pressed="true"><i class="fa fa-edit"></i></button>


                                                        <a href="{{ route('payment.receipt', [ 'payment' => $payment]) }}"
                                                            class="btn btn-danger btn-sm"><i class="fa fa-print"
                                                                aria-hidden="true"></i>
                                                            Receipt
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
