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
                                    <table id="" class="table datatable  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th> subject</th>
                                                <th>status </th>
                                                <th>name </th>
                                                <th> attempt/ result </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($quizzes as $quiz)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $quiz->subject->name }}</td>
                                                    <td
                                                        class="{{ $quiz->status == 'Available' ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $quiz->status }}</td>
                                                    <td>{{ $quiz->title }}</td>
                                                    <td>
                                                        @if (!$quiz->isAttempted($quiz->id))
                                                            <a href="{{ route('student.quiz.atempt', $quiz->id) }}"
                                                                class="btn btn-outline-success btn-sm" role="button">
                                                                Atempt
                                                                <i class="fas fa-person-booth"></i>

                                                            </a>
                                                        @else
                                                            <p>
                                                                {{ auth('student')->user()->quizResult($quiz->id) }}
                                                            </p>
                                                        @endif

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
