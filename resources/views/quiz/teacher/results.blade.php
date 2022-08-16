@extends('layouts.master')
@section('content')
    <div class="card-body">
        <div class="card-header">
            <h3 class="text-center">{{$quiz->title}} result</h3>
        </div>
        <div class="table-responsive">
            <div class="table-responsive mt-15">
                <table class="table datatable table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">name</th>
                            <th class="alert-success">email</th>
                            <th class="alert-success">gender</th>

                            <th class="alert-success">result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->gender->name }}</td>
                                <td>


                                    {{$student->quizResult($quiz->id)}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
