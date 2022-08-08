@extends('layouts.master')

@section('title')
    pay installment
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

                    <form class=" row mb-30" action="{{ route('payment.store', $student->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h4 class="mb-5"> student: {{ $student->name }} Invocie</h3>
                                <h4 class="mb-5"> debit: <span class="text-danger">

                                        {{ $student->debit }}</h3>
                                    </span>
                                    <div class="repeater">
                                        <div>
                                            <div>
                                                <div class="d-flex justify-content-center  ">

                                                    <div class="form-group mr-5 ">
                                                        <label for="description" class="mr-sm-2"><strong>Payer name
                                                            </strong></label>
                                                        <div class="box border">
                                                            <input type="text" placeholder="payer name" class="form-control" name="name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description" class="mr-sm-2"><strong>Amount</strong></label>
                                                        <div class="box border">
                                                            <input type="number" class="form-control" placeholder="amount" name="amount"
                                                                {{ $student->debit ? '' : 'disabled' }}>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="d-flex justify-content-center mt-5">

                                            <button type="submit" class="btn btn-primary col-2">pay</button>
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
