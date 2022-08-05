@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('students_trans.student_details') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('students_trans.student_details') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02" aria-selected="true">details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                    role="tab" aria-controls="profile-02" aria-selected="false">attachments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">name</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">email</th>
                                            <td>{{ $student->email }}</td>
                                            <th scope="row">gender</th>
                                            <td>{{ $student->gender->name }}</td>
                                            <th scope="row">Nationality</th>
                                            <td>{{ $student->nationality->name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">grade</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">level</th>
                                            <td>{{ $student->level->name }}</td>
                                            <th scope="row">classroom</th>
                                            <td>{{ $student->classroom->name }}</td>
                                            <th scope="row">birth date</th>
                                            <td>{{ $student->date_birth }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">father name</th>
                                            <td>{{ $student->parent->father_name }}</td>
                                            <th scope="row">father phone</th>
                                            <td>{{ $student->parent->father_phone }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="academic_year">attachments
                                                        : <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="attachments[]" multiple
                                                        required>
                                                    <input type="hidden" name="student_name"
                                                        value="{{ $student->name }}">
                                                    <input type="hidden" name="student_id"
                                                        value="{{ $student->id }}">
                                                </div>
                                            </div>
                                            <br><br>
                                            <button type="submit" class="button button-border x-small">
                                                {{ trans('students_trans.submit') }}
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <table class="table center-aligned-table mb-0 table table-hover"
                                        style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">image</th>
                                                <th scope="col">file name</th>
                                                <th scope="col">uploaded at</th>
                                                <th scope="col">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td scope="col"><img
                                                            src="{{ asset(Storage::disk('student_attachments')->get($student->id.'/'.$attachment->name)) }}"
                                                            alt=""></td>
                                                    <td>{{ $attachment->name }}</td>
                                                    <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="{{ url('Download_attachment') }}/{{ $attachment->imageable->name }}/{{ $attachment->filename }}"
                                                            role="button"><i class="fas fa-download"></i>&nbsp;
                                                            {{ trans('students_trans.Download') }}</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                            title="{{ trans('Grades_trans.Delete') }}">{{ trans('students_trans.delete') }}
                                                        </button>

                                                    </td>
                                                </tr>
                                                {{-- @include('pages.students.Delete_img') --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- row closed -->
    @endsection
    @section('js')
        @toastr_js
        @toastr_render
    @endsection
