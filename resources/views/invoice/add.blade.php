@extends('layouts.master')

@section('title')
    Add new Invocie
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class=" row mb-30" action="{{ route('invoice.store', $student->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h4 class="mb-5"> student: {{ $student->name }} Invocie</h3>
                                <div class="repeater">
                                    <div data-repeater-list="invoices">
                                        <div data-repeater-item>
                                            <div class="row">


                                                <div class="col">
                                                    <label for="expense_id" class="mr-sm-2">Expenses</label>
                                                    <div class="box">
                                                        <select class="custom-select" name="expense_id" required>
                                                            <option value="">choose the expense</option>
                                                            @foreach ($expenses as $expense)
                                                                <option value="{{ $expense->id }}">{{ $expense->title }} -
                                                                    {{ $expense->amount }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="type" class="mr-sm-2">type</label>
                                                    <div class="box">
                                                        <select class="custom-select" name="type" required>
                                                            <option value="">choose the type</option>
                                                            @foreach ($types as $type)
                                                                <option value="{{ $type }}">{{ $type }}

                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="col">
                                                    <label for="description" class="mr-sm-2">description</label>
                                                    <div class="box">
                                                        <input type="text" class="form-control" name="description">
                                                    </div>
                                                </div>

                                                <div class="col d-flex flex-column">
                                                    <label for="Name_en" class="mr-sm-2 ">actions:</label>
                                                    <input class="btn btn-danger btn-sm col-5" data-repeater-delete
                                                        type="button" value="delete" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-4">
                                            <input class="button" class="btn btn-sm col-2" data-repeater-create
                                                type="button" value="add" />
                                        </div>
                                    </div><br>

                                    <div class="d-flex justify-content-center">

                                        <button type="submit" class="btn btn-primary col-2">submit</button>
                                    </div>
                                </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
