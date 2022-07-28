@extends('layouts.master')
@section('title')
    levels
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Level
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>level name</th>
                                    <th>grade name</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $level)
                                    <tr>
                                        <td>{{ $level->name }}</td>
                                        <td>{{ $level->grade->name }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal-{{ $level->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $level->id }}">
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>level Name</th>
                                    <th>grade name</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('level.store') }}" class="form" method="post">
                                @csrf
                                <div class="repeater">
                                    <div data-repeater-list="List_Classes">
                                        <div data-repeater-item>
                                            <div class="d-flex ">
                                                <div class="form-group mr-1 col-4">
                                                    <label for="name_ar">
                                                        Arabic name
                                                    </label>
                                                    <input type="text" class="form-control border" name="name_ar">
                                                    @error('name_ar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="name_en">
                                                        English name
                                                    </label>
                                                    <input type="text" class="form-control border" name="name_en">
                                                    @error('name_en')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="form-group col-4">
                                                    <label for="grade">
                                                        levels
                                                    </label>
                                                    <select class="form-control" name="grade_id">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="Add" />
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add level</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>

                    </div>

                </div>


                </form>

            </div>
        </div>
    </div> --}}






    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        Add Level
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{route('level.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater ">
                                <div data-repeater-list="levels">
                                    <div data-repeater-item class="mt-2">
                                        <div class="d-flex justify-content-between">

                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">Arabic name
                                                    :</label>
                                                <input class="form-control" type="text" name="name_ar" />
                                            </div>


                                            <div class="col">
                                                <label for="Name" class="mr-sm-2">English name
                                                    :</label>
                                                <input class="form-control" type="text" name="name_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en" class="mr-sm-2">grade name
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect form-control" name="grade_id">
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="" class="mr-sm-2"></label>
                                                <input class="btn btn-danger btn-sm" data-repeater-delete type="button"
                                                    value="Delete" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20 mb-2">
                                    <div class="col-12">
                                        <input class="btn btn-sm btn-success" data-repeater-create type="button" value="Add" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                    <button type="submit" class="btn btn-success">submit</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>



























    @foreach ($levels as $level)
        <div class="modal fade" id="editModal-{{ $level->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">update Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('level.update', $level->id) }}" class="form" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="d-flex">
                                        <div class="form-group mr-1">
                                            <label for="name_ar">
                                                Arabic name
                                            </label>
                                            <input type="text" class="form-control border" name="name_ar"
                                                value="{{ $level->getTranslation('name', 'ar') }}">
                                            @error('name_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">
                                                English name
                                            </label>
                                            <input type="text" class="form-control border" name="name_en"
                                                value="{{ $level->getTranslation('name', 'en') }}">
                                            @error('name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="grade">
                                            Grades
                                        </label>
                                        <select name="grade_id" class="form-control">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    @if ($level->grade_id == $grade->id) selected @endif>
                                                    {{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update Level</button>
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

    @foreach ($levels as $level)
        <div class="modal fade" id="deleteModal-{{ $level->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{ $level->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $level->name }} ?
                    </div>
                    <form action="{{ route('level.delete', $level->id) }}" method="post">
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
