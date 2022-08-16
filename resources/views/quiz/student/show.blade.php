@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card-heaer">
                                        <h3 class="text-center">{{ $quiz->title }}</h3>
                                    </div>
                                    <form>
                                        @foreach ($questions as $question)
                                            <fieldset id="group-{{ $loop->iteration }}" class="card-header">
                                                <label for=""> <strong>{{ $question->title }} </strong></label>
                                                <div class="d-flex flex-column">
                                                    <div class="form-group">
                                                        <input type="radio" value="{{ $question->answer_1 }}"
                                                            name="question-{{ $question->id }}">
                                                        <label for="">{{ $question->answer_1 }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" value="{{ $question->answer_2 }}"
                                                            name="question-{{ $question->id }}">
                                                        <label for="">{{ $question->answer_2 }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" value="{{ $question->answer_3 }}"
                                                            name="question-{{ $question->id }}">
                                                        <label for="">{{ $question->answer_3 }}</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" value="{{ $question->answer_4 }}"
                                                            name="question-{{ $question->id }}">
                                                        <label for="">{{ $question->answer_4 }}</label>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        @endforeach

                                        <div class="form-group mt-2">
                                            <button class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {


            $(document).bind('cut copy paste', function(e) {

                e.preventDefault();

            });


            $(document).on("contextmenu", function(e) {

                return false;

            });

        });
    </script>
@endsection
