@extends('layouts.master')


@section('content')
    <div class="">


        <div class="card-header">
           <h3 class="text-center">
               Absent days
            </h3> 
        </div>
        <table id="studentsTable" class="table datatable  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">day</th>
                    <th class="alert-success">teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $attendance)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->attendance_date }}</td>
                    <td>{{ $attendance->teacher->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
