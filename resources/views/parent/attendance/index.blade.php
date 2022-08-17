@extends('layouts.master')
@section('content')
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">

            <div class="card-body">
                <h5 class="card-title">Attendance</h5>
                <div class="accordion accordion-border no-radius">
                    @foreach ($students as $student)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $student->name }}</a>
                            <div class="acd-des">
                                <div class="card-body">

                                    <table id="studentsTable"
                                        class="table datatable  table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="alert-danger">#</th>
                                                <th class="alert-danger">day</th>
                                                <th class="alert-danger">teacher</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->attendance as $attendance)
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attendance->attendance_date }}</td>
                                                <td>{{ $attendance->teacher->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
