@extends('layouts.master')
@section('title')
    Students
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add
                        Student</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table class="table datatable  table-striped table-bordered p-0">
                            <thead>
                                <tr>

                                    <th>Email</th>
                                    <th>name</th>
                                    <th>Father name</th>
                                    <th>gender</th>
                                    <th>Nationality</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>Classroom</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($students as $student)
                                    <tr>

                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->parent->father_name }}</td>
                                        <td>{{ $student->gender->name }}</td>
                                        <td>{{ $student->nationality->name }}</td>
                                        <td>{{ $student->grade->name }}</td>
                                        <td>{{ $student->level->name }}</td>
                                        <td>{{ $student->classroom->name }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm m-1" data-toggle="modal"
                                                data-target="#editModal-{{ $student->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#deleteModal-{{ $student->id }}">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Email</th>
                                    <th>name</th>
                                    <th>Father name</th>
                                    <th>gender</th>
                                    <th>Nationality</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>Classroom</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">


                        @livewire('add-student', ['parents' => $parents, 'genders' => $genders, 'nationalities' => $nationalities, 'bloodTypes' => $bloodTypes, 'grades' => $grades])


                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>




    @foreach ($students as $student)
        <div class="modal fade" id="editModal-{{ $student->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit Students</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('student.update', $student->id) }}" class="form" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <div class="d-flex">
                                        <div class="form-group mr-1">
                                            <label for="name_ar">
                                                student name (ar)
                                            </label>
                                            <input type="text" value="{{ $student->getTranslation('name', 'ar') }}"
                                                class="form-control border" name="name_ar">
                                            @error('name_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">
                                                student name (en)
                                            </label>
                                            <input type="text" class="form-control border"
                                                value="{{ $student->getTranslation('name', 'en') }}" name="name_en">
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
                                            value="{{ $student->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">
                                            password
                                        </label>
                                        <input type="password" class="form-control border" value="{{ $student->password }}"
                                            name="password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="d-flex ">

                                        <div class="form-group col-6">
                                            <label for="gender_id">Gender</label>
                                            <select name="gender_id" class="form-control" id="">
                                                <option value="">Choose gender</option>
                                                @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}"
                                                        @if ($gender->id == $student->gender_id) selected @endif>
                                                        {{ $gender->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('gender_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="nationlitie_id">Nationality</label>
                                            <select name="nationlitie_id" class="form-control" id="">
                                                <option value="">Choose nationality</option>
                                                @foreach ($nationalities as $nationlitie)
                                                    <option value="{{ $nationlitie->id }}"
                                                        @if ($nationlitie->id == $student->nationalitie_id) selected @endif>
                                                        {{ $nationlitie->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('nationlitie_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <hr class="m-2">
                                    <div class="d-flex">

                                        <div class="form-group col-6">
                                            <label for="blood_id">Blood</label>
                                            <select name="blood_id" class="form-control" id="">
                                                <option value="">Choose blood</option>
                                                @foreach ($bloodTypes as $blood)
                                                    <option value="{{ $blood->id }}"
                                                        @if ($blood->id == $student->blood_type_id) selected @endif>
                                                        {{ $blood->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('blood_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="parent_id">parents</label>
                                            <select name="parent_id" class="form-control" id="">
                                                <option value="">Choose parent</option>
                                                @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}"
                                                        @if ($parent->id == $student->student_parent_id) selected @endif>
                                                        {{ $parent->father_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="m-2">
                                    @livewire('edit-student', ['grades' => $grades, 'student' => $student], key($student->id))

                                    <hr class="m-2">


                                    <div class="form-group">
                                        <label for="">birth date</label>
                                        <input type="date" class="form-control" value="{{ $student->date_birth }}"
                                            name="date_birth">
                                    </div>


                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update Student</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                            </div>

                        </div>
                    </div>

                </div>


                </form>

            </div>
        </div>
        </div>
    @endforeach



















    {{-- delete modal --}}
    @foreach ($students as $student)
        <div class="modal fade" id="deleteModal-{{ $student->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{ $student->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $student->name }} ?
                    </div>
                    <form action="{{ route('student.delete', $student->id) }}" method="post">
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
