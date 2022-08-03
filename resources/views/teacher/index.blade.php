@extends('layouts.master')

@section('title')
    Teachers
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add teacher
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>specialization</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->specialization->name }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal-{{ $teacher->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $teacher->id }}">
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>specialization</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- create modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('teacher.store') }}" class="form" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group mr-1">
                                        <label for="name_ar">
                                            teacher name (ar)
                                        </label>
                                        <input type="text" class="form-control border" name="name_ar">
                                        @error('name_ar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_en">
                                            teacher name (en)
                                        </label>
                                        <input type="text" class="form-control border" name="name_en">
                                        @error('name_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email
                                    </label>
                                    <input type="email" class="form-control border" name="email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        password
                                    </label>
                                    <input type="password" class="form-control border" name="password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="specializaion_id">specialization</label>
                                    <select name="specialization_id" class="form-control" id="">
                                        <option value="">Choose specialization</option>
                                        @foreach ($specializations as $spe)
                                            <option value="{{ $spe->id }}">{{ $spe->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('specialization_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender_id">Gender</label>
                                    <select name="gender_id" class="form-control" id="">
                                        <option value="">Choose gender</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Joining date</label>
                                    <input type="date" class="form-control" name="joining_date">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="" cols="5" rows="5"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add teacher</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                        </div>

                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>
    {{-- end create modal --}}






    {{-- edit modal --}}
    @foreach ($teachers as $teacher)
        <div class="modal fade" id="editModal-{{ $teacher->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add teacher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('teacher.update', $teacher->id) }}" class="form"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex">
                                        <div class="form-group mr-1">
                                            <label for="name_ar">
                                                teacher name (ar)
                                            </label>
                                            <input type="text" class="form-control border" name="name_ar"
                                                value="{{ $teacher->getTranslation('name', 'ar') }}">
                                            @error('name_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">
                                                teacher name (en)
                                            </label>
                                            <input type="text" class="form-control border" name="name_en"
                                                value="{{ $teacher->getTranslation('name', 'en') }}">
                                            @error('name_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" class="form-control border" name="email"
                                            value="{{ $teacher->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            password
                                        </label>
                                        <input type="password" class="form-control border" name="password"
                                            value="{{ $teacher->password }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="specializaion_id">specialization</label>
                                        <select name="specialization_id" class="form-control" id="">
                                            <option value="">Choose specialization</option>
                                            @foreach ($specializations as $spe)
                                                <option value="{{ $spe->id }}"
                                                    @if ($teacher->specialization_id == $spe->id) selected @endif>
                                                    {{ $spe->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('specialization_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- @dd($teacher->gender_id) --}}
                                    <div class="form-group">
                                        <label for="gender_id">Gender</label>
                                        <select name="gender_id" class="form-control">
                                            <option>Choose gender</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}"
                                                    @if ($teacher->gender_id == $gender->id) selected @endif>
                                                    {{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('gender_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">Joining date</label>
                                        <input type="date" class="form-control" name="joining_date"
                                            value="{{ $teacher->joining_date }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" class="form-control" id="" cols="5" rows="5">{{ $teacher->address }}</textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update teacher</button>
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
    {{-- end edit modal --}}

    {{-- delete modal --}}
    @foreach ($teachers as $teacher)
        <div class="modal fade" id="deleteModal-{{ $teacher->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{ $teacher->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $teacher->name }} ?
                    </div>
                    <form action="{{ route('teacher.delete', $teacher->id) }}" method="post">
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
    {{-- end  delete modal --}}
@endsection
