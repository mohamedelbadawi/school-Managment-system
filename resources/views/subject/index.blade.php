@extends('layouts.master')

@section('title')
    subjects
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
                                <a href="" class="btn btn-success btn-sm" role="button" aria-pressed="true"
                                    data-toggle="modal" data-target="#createModal"> Add new subject </a><br><br>
                                <div class="table-responsive">
                                    <table class="table datatable table-hover table-sm table-bordered p-0"
                                        data-page-length="50" style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>name </th>
                                                <th>grade </th>
                                                <th>level</th>

                                                <th>teacher </th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>{{ $subject->grade->name }}</td>
                                                    <td>{{ $subject->level->name }}</td>
                                                    <td>{{ $subject->teacher->name }}</td>
                                                    <td>

                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#editModal-{{ $subject->id }}"
                                                            title="edit"><i class="fa fa-edit"></i></button>

                                                        <button type="button" class="btn  btn-sm btn-danger "
                                                            data-toggle="modal"
                                                            data-target="#delete_subject{{ $subject->id }}"
                                                            title="حذف"><i class="fa fa-trash"></i></button>

                                                    </td>
                                                </tr>

                                                <div class="modal fade" id="delete_subject{{ $subject->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="{{ route('subject.delete', $subject->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title" id="exampleModalLabel">delete
                                                                        subject
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p> Are you sure about that?
                                                                        {{ $subject->name }}</p>

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






    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('subject.store') }}" class="form" method="post">
                                @csrf


                                <div class="form-group">
                                    <label for="name">
                                        name
                                    </label>
                                    <input type="text" class="form-control border" name="name">
                                    @error('name_en')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                @livewire('expenses-dropdown', ['grades' => $grades])

                                <div class="form-group">
                                    <label for="teacher_id">teacher</label>
                                    <select name="teacher_id" id="" class="custom-select">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">
                                                {{ $teacher->name }} -- {{ $teacher->specialization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add subject</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>

                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>
    @foreach ($subjects as $subject)
        <div class="modal fade" id="editModal-{{ $subject->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">update subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('subject.update', $subject->id) }}" class="form"
                                    method="post">
                                    @method('PATCH')
                                    @csrf


                                    <div class="form-group">
                                        <label for="name">
                                            name
                                        </label>
                                        <input type="text" class="form-control border" name="name"
                                            value="{{ $subject->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @livewire('expenses-dropdown', ['grades' => $grades, 'data' => $subject])

                                    <div class="form-group">
                                        <label for="teacher_id">teacher</label>
                                        <select name="teacher_id" id="" class="custom-select">
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}"
                                                    {{ $teacher->id == $subject->id ? 'selected' : '' }}>
                                                    {{ $teacher->name }} -- {{ $teacher->specialization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update subject</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                            </div>

                        </div>

                    </div>


                    </form>

                </div>
            </div>
        </div>
    @endforeach
@endsection
