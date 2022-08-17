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
                                                <th> title</th>
                                                <th> result </th>
                                                <th> date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $result)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $result->quiz->title }}</td>

                                                    <td>{{ $result->result }}</td>
                                                    <td>
                                                        {{ $result->created_at }}
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
