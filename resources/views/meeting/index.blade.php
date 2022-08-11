@extends('layouts.master')
@section('title')
    meetings
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    @auth('teacher')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            Add meeting
                        </button>
                    @endauth
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>meeting id</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>classroom</th>
                                    <th>subject</th>
                                    <th>start at</th>
                                    <th>join now</th>
                                    @auth('teacher')
                                        <th>start now</th>
                                        <th>Actions</th>
                                    @endauth

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    <tr>
                                        <td>{{ $meeting->title }}</td>
                                        <td>{{ $meeting->meeting_id }}</td>
                                        <td>{{ $meeting->grade->name }}</td>
                                        <td>{{ $meeting->level->name }}</td>
                                        <td>{{ $meeting->classroom->name }}</td>
                                        <td>{{ $meeting->subject->name }}</td>
                                        <td>{{ $meeting->start_at }}</td>
                                        <td><a href="{{ $meeting->join_url }}" class="btn-outline-danger">join now</a> </td>


                                        @auth('teacher')
                                            <td><a href="{{ $meeting->start_url }}" class="btn-outline-danger">start now</a>
                                            </td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#editModal-{{ $meeting->id }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal-{{ $meeting->id }}">
                                                    Delete
                                                </button>

                                            </td>
                                        @endauth

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>title</th>
                                    <th>meeting id</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>classroom</th>
                                    <th>subject</th>
                                    <th>start at</th>
                                    <th>join now</th>
                                    @auth('teacher')
                                        <th>start now</th>
                                        <th>Actions</th>
                                    @endauth

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- create meeting --}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add meeting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('meeting.store') }}" class="form" method="post">
                                @csrf
                                <div class="d-flex">

                                    <div class="form-group mr-1">
                                        <label for="name">
                                            title
                                        </label>
                                        <input type="text" class="form-control border" name="title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                                @livewire('quiz-data', ['grades' => $grades])

                                {{-- <div class="form-group">
                                    <label for="subject_id">subjects</label>
                                    <select name="subject_id" class="form-control" id="">
                                        <option value="">Choose subjects</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> --}}


                                <div class="form-group">
                                    <label for="">start at</label>
                                    <input type="datetime-local" class="form-control" name="start_at">
                                </div>



                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add meeting</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>

                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>
    {{-- end meeting --}}
@endsection
