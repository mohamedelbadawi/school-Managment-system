@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-responsive mt-15">
                            <table class="table datatable center-aligned-table mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th>name</th>
                                        <th>level</th>
                                        <th>status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($classrooms as $classroom)
                                        <tr>
                                            <td>{{ $classroom->name }}</td>
                                            <td>{{ $classroom->level->name }}
                                            </td>
                                            <td>
                                                <label
                                                    class="badge badge-{{ $classroom->status == 1 ? 'success' : 'danger' }}">{{ $classroom->status == 1 ? 'Active' : ' InActive' }}</label>
                                            </td>

                                            <td>
                                                <a href="{{ route('attendance.show', $classroom->id) }}"
                                                    class="btn btn-warning btn-sm" role="button" aria-pressed="true">show</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
