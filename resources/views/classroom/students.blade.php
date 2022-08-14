@extends('layouts.master')


@section('content')
    <div class="">


        <button class="btn-primary btn" onclick="printData()">Print</button>

        <table id="studentsTable" class="table datatable  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">name</th>
                    <th class="alert-success">email</th>
                    <th class="alert-success">gender</th>
                    <th class="alert-success">nationality</th>
                    <th class="alert-success">religion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender->name }}</td>
                    <td>{{ $student->nationality->name }}</td>
                    <td>{{ $student->parent->religion->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
@section('js')
    <script>
        function printData() {
            var print_ = document.getElementById("studentsTable");
            win = window.open("");
            win.document.write(print_.outerHTML);
            win.print();
            win.close();
        }
    </script>
@endsection
