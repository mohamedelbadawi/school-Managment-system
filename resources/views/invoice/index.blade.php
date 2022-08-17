@extends('layouts.master')

@section('title')
    Invoices
@endsection

@section('content')
    <!-- row -->
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
                                                <th>student name</th>
                                                <th>expances name</th>
                                                <th>amount</th>
                                                <th>description</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->student->name }}</td>
                                                    <td>{{ $invoice->expense->title }}</td>
                                                    <td>{{ number_format($invoice->amount, 2) }}</td>

                                                    <td>{{ $invoice->description ? $invoice->description : '-' }}</td>

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

















    <!-- row closed -->
@endsection
