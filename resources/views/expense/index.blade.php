@extends('layouts.master')

@section('title')
    expenses
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add expense
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>amount</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>year</th>
                                    <th>description</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->title }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->grade->name }}</td>
                                        <td>{{ $expense->level->name }}</td>
                                        <td>{{ $expense->year }}</td>
                                        <td>{{ $expense->description }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModal-{{ $expense->id }}">
                                                Edit
                                            </button>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $expense->id }}">
                                                Delete
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>title</th>
                                    <th>amount</th>
                                    <th>grade</th>
                                    <th>level</th>
                                    <th>year</th>
                                    <th>description</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-body">

                            <form action="{{ route('expense.store') }}" class="form" method="post">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group mr-1">
                                        <label for="name_ar">
                                            title (ar)
                                        </label>
                                        <input type="text" class="form-control border" name="title_ar">
                                        @error('title_ar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name_en">
                                            title (en)
                                        </label>
                                        <input type="text" class="form-control border" name="title_en">
                                        @error('title_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        amount
                                    </label>
                                    <input type="number" class="form-control border" name="amount">
                                    @error('amount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @livewire('expenses-dropdown', ['grades' => $grades])

                                <div class="form-group">
                                    <label for="">year</label>
                                    <input type="text" class="form-control" name="year">
                                    @error('year')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <textarea name="description" class="form-control" id="" cols="5" rows="5"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Add expense</button>
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
    @foreach ($expenses as $expense)
        <div class="modal fade" id="editModal-{{ $expense->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit expense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{ route('expense.update', $expense->id) }}" class="form" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="form-group mr-1">
                                            <label for="name_ar">
                                                title (ar)
                                            </label>
                                            <input type="text" value="{{ $expense->getTranslation('title', 'ar') }}"
                                                class="form-control border" name="title_ar">
                                            @error('title_ar')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name_en">
                                                title (en)
                                            </label>
                                            <input type="text" class="form-control border"
                                                value="{{ $expense->getTranslation('title', 'en') }}" name="title_en">
                                            @error('title_en')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            amount
                                        </label>
                                        <input type="number" class="form-control border" name="amount"
                                            value="{{ $expense->amount }}">
                                        @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @livewire('expenses-dropdown', ['grades' => $grades, 'data' => $expense])

                                    <div class="form-group">
                                        <label for="">year</label>
                                        <input type="text" class="form-control" name="year"
                                            value="{{ $expense->year }}">
                                        @error('year')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <textarea name="description" class="form-control" id="" cols="5" rows="5">{{ $expense->description }}</textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-success" type="submit">update expense</button>
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
    @foreach ($expenses as $expense)
        <div class="modal fade" id="deleteModal-{{ $expense->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{ $expense->title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete {{ $expense->title }} ?
                    </div>
                    <form action="{{ route('expense.delete', $expense->id) }}" method="post">
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
