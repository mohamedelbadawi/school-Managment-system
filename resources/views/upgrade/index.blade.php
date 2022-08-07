@extends('layouts.master')

@section('title')
    upgrades history
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <br><br>


                                <div class="table-responsive">
                                    <table class="table datatable table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="alert-info">#</th>
                                                <th class="alert-info">{{ trans('Students_trans.name') }}</th>
                                                <th class="alert-danger">المرحلة الدراسية السابقة</th>
                                                <th class="alert-danger">الصف الدراسي السابق</th>
                                                <th class="alert-danger">القسم الدراسي السابق</th>
                                                <th class="alert-success">المرحلة الدراسية الحالي</th>
                                                <th class="alert-success">الصف الدراسي الحالي</th>
                                                <th class="alert-success">القسم الدراسي الحالي</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($upgrades as $upgrade)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $upgrade->student->name }}</td>
                                                    <td>{{ $upgrade->previousGrade->name }}</td>
                                                    <td>{{ $upgrade->previouslevel->name }}</td>
                                                    <td>{{ $upgrade->previousClassroom->name }}</td>
                                                    <td>{{ $upgrade->currentGrade->name }}</td>
                                                    <td>{{ $upgrade->currentLevel->name }}</td>
                                                    <td>{{ $upgrade->currentClassroom->name }}</td>
                                                    <td>
                                                    
                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteModal-{{ $upgrade->id }}"
                                                            title="Cancel"><i
                                                                class="fa fa-trash"></i></button>
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


    @foreach ($upgrades as $upgrade)
        <div class="modal fade" id="deleteModal-{{ $upgrade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">cancel {{ $upgrade->student->name }} upgrade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this upgrade ?
                    </div>
                    <form action="{{ route('upgrade.delete', $upgrade->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
    <!-- row closed -->
@endsection
