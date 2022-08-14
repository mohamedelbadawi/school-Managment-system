@extends('layouts.master')
@section('title')
    classrooms
@endsection

@section('content')
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-header d-flex justify-content-end">

                
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addlevelModal">
                        Add classroom
                    </button>
                
            </div>
            <div class="card-body">
                <h5 class="card-title">Classrooms of grades</h5>
                <div class="accordion accordion-border no-radius">
                    @foreach ($grades as $grade)
                        <div class="acd-group">
                            <a href="#" class="acd-heading">{{ $grade->name }}</a>
                            <div class="acd-des">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table datatable table-striped table-bordered p-0">
                                            <thead>
                                                <tr>
                                                    <th>classroom</th>
                                                    <th>level</th>
                                                    <th>status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grade->classrooms as $classroom)
                                                    <tr>
                                                        <td>{{ $classroom->name }}</td>
                                                        <td>{{ $classroom->level->name }}</td>
                                                        <td>
                                                            <label
                                                                class=" badge {{ $classroom->status ? 'badge-success' : 'badge-danger' }}">

                                                                {{ $classroom->status ? 'Active' : 'Inactive' }}
                                                        </td>
                                                        </label>
                                                        <td>
                                                            <button class="btn btn-primary" data-toggle="modal"
                                                                data-target="#editModal-{{ $classroom->id }}">
                                                                Edit
                                                            </button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                data-target="#deleteModal-{{ $classroom->id }}">
                                                                Delete
                                                            </button>

                                                            <a class="btn btn-warning"
                                                                href="{{ route('classroom.students', $classroom->id) }}">
                                                                view students
                                                            </a>

                                                        </td>
                                                    </tr>


                                                    {{-- edit modal --}}
                                                    <div class="modal fade" id="editModal-{{ $classroom->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">edit
                                                                        class room
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card">

                                                                        @livewire('edit-classroom', ['classroom' => $classroom, 'grades' => $grades], key($classroom->id))

                                                                    </div>

                                                                </div>


                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end edit modal --}}

                                                    {{-- delete modal --}}
                                                    <div class="modal fade" id="deleteModal-{{ $classroom->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                        {{ $classroom->name }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete {{ $classroom->name }}
                                                                    ?
                                                                </div>
                                                                <form
                                                                    action="{{ route('classroom.delete', $classroom->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- end delete modal --}}
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>classroom</th>
                                                    <th>level</th>
                                                    <th>status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>







    <div class="modal fade" id="addlevelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add classroom</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        @livewire('add-classroom', ['grades' => $grades])
                    </div>

                </div>


                </form>

            </div>
        </div>
    </div>
@endsection
