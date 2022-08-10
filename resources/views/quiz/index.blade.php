@extends('layouts.master')
@section('title')
    Quizzes
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <a class="btn btn-success" href="{{ route('quiz.create') }}">Add quiz</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table datatable  table-striped table-bordered p-0">
                            <thead>
                                <tr>

                                    <th>level</th>
                                    <th>classroom</th>
                                    <th>subject</th>
                                    <th>questions number</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($quizzes as $quiz)
                                    <tr>

                                        <td>{{ $quiz->level->name }}</td>
                                        <td>{{ $quiz->classroom->name }}</td>
                                        <td>{{ $quiz->subject->name }}</td>
                                        <td>{{ $quiz->questions->count() }}</td>

                                        <td>


                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#editModal-{{ $quiz->id }}" title="edit"><i
                                                    class="fa fa-edit"></i></button>

                                            <button type="button" class="btn  btn-sm btn-danger " data-toggle="modal"
                                                data-target="#deletModal-{{ $quiz->id }}" title="delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>


                                        <div class="modal fade" id="deletModal-{{ $quiz->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action="{{ route('quiz.delete', $quiz->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">delete
                                                                quiz
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Are you sure about that?
                                                                {{ $quiz->name }}</p>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>







                    </div>
                </div>

                </td>
                </tr>
                @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>level</th>
                        <th>classroom</th>
                        <th>subject</th>
                        <th>questions number</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>

                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
