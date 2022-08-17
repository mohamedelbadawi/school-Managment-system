@extends('layouts.master')
@section('content')
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">

            <div class="card-body">
                <h5 class="card-title">Payments</h5>
                <div class="accordion accordion-border no-radius">
                    @foreach ($students as $student)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $student->name }} </a>
                            <div class="acd-des">
                                <div class="card-body">

                                    <!-- row -->
                                    <div class="row">
                                        <div class="col-md-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="col-xl-12 mb-30">
                                                        <div class="card card-statistics h-100">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table id=""
                                                                        class="table datatable table-hover table-sm table-bordered p-0"
                                                                        data-page-length="50" style="text-align: center">
                                                                        <thead>
                                                                            <tr class="alert-success">
                                                                                <th>#</th>

                                                                                <th>name</th>
                                                                                <th>amount</th>
                                                                                <th>date</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($student->payments as $payment)
                                                                                <tr>
                                                                                    <td>{{ $loop->iteration }}</td>
                                                                                    <td>{{ $payment->name }}</td>
                                                                                    <td>{{ number_format($payment->amount, 2) }}
                                                                                    </td>
                                                                                    <td>{{ $payment->created_at }}
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


                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
