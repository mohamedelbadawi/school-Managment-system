@extends('layouts.master')
@section('title')
    Grades
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add grade
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table  class="table datatable table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr>
                                        <td>{{ $grade->name }}</td>
                                        <td>{{ $grade->note }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal-{{ $grade->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $grade->id }}">
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>note</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Grade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('grade.store') }}" class="form" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group mr-1">
                                        <label for="name_ar">
                                            Arabic name
                                        </label>
                                        <input type="text" class="form-control border" name="name_ar">
                                        @error('name_ar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_en">
                                            English name
                                        </label>
                                        <input type="text" class="form-control border" name="name_en">
                                        @error('name_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="note">
                                        Notes
                                    </label>
                                    <textarea name="note" id="" cols="30" rows="3"></textarea>
                                    @error('note')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add Grade</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>

                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>

    @foreach ($grades as $grade)
        <div class="modal fade" id="editModal-{{ $grade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Grade</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('grade.update', $grade->id) }}" class="form" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="d-flex">
                                        <div class="form-group mr-1">
                                            <label for="name_ar">
                                                Arabic name
                                            </label>
                                            <input type="text" class="form-control border" name="name_ar"
                                                value="{{ $grade->getTranslation('name', 'ar') }}">
                                            @error('name_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">
                                                English name
                                            </label>
                                            <input type="text" class="form-control border" name="name_en"
                                                value="{{ $grade->getTranslation('name', 'en') }}">
                                            @error('name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="note">
                                            Notes
                                        </label>
                                        <textarea name="note" id="" cols="30" rows="3" nam>
                                            {{ $grade->note }}
                                        </textarea>
                                        @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update Grade</button>
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

    @foreach ($grades as $grade)
        <div class="modal fade" id="deleteModal-{{ $grade->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{ $grade->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $grade->name }} ?
                    </div>
                    <form action="{{ route('grade.delete', $grade->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
@endsection
