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
                                                <th>grade</th>
                                                <th>level</th>
                                                <th>description</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $invoice->student->name }}</td>
                                                    <td>{{ $invoice->expense->title }}</td>
                                                    <td>{{ number_format($invoice->amount, 2) }}</td>
                                                    <td>{{ $invoice->grade->name }}</td>
                                                    <td>{{ $invoice->level->name }}</td>
                                                    <td>{{ $invoice->description }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" role="button"
                                                            aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#"><i
                                                                class="fa fa-trash"></i></button>
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
    <!-- row closed -->
@endsection
