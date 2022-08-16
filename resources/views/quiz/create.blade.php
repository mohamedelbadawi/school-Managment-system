@extends('layouts.master')

@section('title')
    Add Quiz
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

                    <form class=" row mb-30" action="{{ route('quiz.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <h4 class="mb-5"> Quiz</h3>
                                <div class="card-header border">
                                    @livewire('quiz-data', ['grades' => $grades])
                                    <div class="form-group border">
                                        <input type="text" class="form-control" name="title" placeholder="title">
                                    </div>


                                </div>


                                <div class="repeater">
                                    <div data-repeater-list="questions" class="">
                                        <div data-repeater-item>
                                            <div class="row  m-2 p-3 box">
                                                <div class="form-group col-3">
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="question title">
                                                </div>
                                                <div class="form-group   col-3">
                                                    <input type="text" name="answer_1" class="form-control"
                                                        placeholder="answer 1">
                                                </div>
                                                <div class="form-group  col-3">
                                                    <input type="text" name="answer_2" class="form-control"
                                                        placeholder="answer 2">
                                                </div>
                                                <div class="form-group  col-3">
                                                    <input type="text" name="answer_3" class="form-control"
                                                        placeholder="answer 3">
                                                </div>
                                                <div class="form-group  col-3">
                                                    <input type="text" name="answer_4" class="form-control"
                                                        placeholder="answer 4">
                                                </div>
                                                <div class="form-group  col-3">
                                                    <input type="text" name="right_answer" class="form-control"
                                                        placeholder="right answer">
                                                </div>

                                                <div class="form-group  col-3">
                                                    <input type="number" class="form-control" name="point"
                                                        placeholder="point">
                                                </div>
                                                <div class="col-3 d-flex flex-column">
                                                    <label for="Name_en" class="mr-sm-2 ">actions:</label>
                                                    <input class="btn btn-danger btn-sm col-5 delete" data-repeater-delete
                                                        type="button" value="delete" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-4">
                                            <input class="button" class="btn btn-sm col-2 add" data-repeater-create
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
