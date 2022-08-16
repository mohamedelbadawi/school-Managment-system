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
                                                <th>name </th>
                                                <th>status </th>
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
                                                        <button {{ $quiz->isAttempted($quiz->id) ? 'disabled' : '' }}
                                                            href="{{ route('student.quiz.atempt', $quiz->id) }}"
                                                            class="btn btn-outline-success btn-sm" role="button"
                                                            aria-pressed="true" onclick="alertAbuse()">
                                                            Atempt
                                                            <i class="fas fa-person-booth"></i>

                                                        </button>
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
