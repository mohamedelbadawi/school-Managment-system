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
                                               
                                                    <td>{{ $invoice->description ? $invoice->description : '-' }}</td>
                                                    <td>
                                                        <button data-toggle="modal"
                                                            data-target="#editModal-{{ $invoice->id }}"
                                                            class="btn btn-info btn-sm" role="button"
                                                            aria-pressed="true"><i class="fa fa-edit"></i></button>


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













    @foreach ($invoices as $invoice)
        {{-- @dd($invoice->studentAcount) --}}
        {{-- <div class="modal fade" id="editModal-{{ $invoice->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit invoice {{ $invoice->student->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('grade.update', $invoice->id) }}" class="form" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="d-flex">

                                        <div class="form-group">
                                            <label for="expense_id" class="mr-sm-2">Expenses</label>
                                            <div class="box">
                                                <select class="custom-select" name="expense_id" required>
                                                    <option value="">choose the expense</option>
                                                    @foreach ($expenses as $expense)
                                                        <option value="{{ $expense->id }}"
                                                            @if ($expense->id == $invoice->expense_id) selected @endif>
                                                            {{ $expense->title }}
                                                            -
                                                            {{ $expense->amount }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="type" class="mr-sm-2">type</label>
                                            <div class="box">
                                                <select class="custom-select" name="type" required>
                                                    <option value="">choose the type</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type }}"
                                                            @if ($type == $invoice->studentAcount->first()->type) selected @endif>

                                                            {{ $type }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <label for="note">
                                            Description
                                        </label>
                                        <textarea name="description" class="form-control" id="" cols="30" rows="3">
                                           {{ $invoice->description }}
                                          </textarea>
                                        @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update invoice</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                            </div>

                        </div>

                    </div>


                    </form>

                </div>
            </div>
        </div> --}}
    @endforeach





    <!-- row closed -->
@endsection
