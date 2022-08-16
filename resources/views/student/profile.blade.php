@extends('layouts.master')


@section('content')
    <!-- row -->
    <div class="card">

        <div class="card-header">
            <h3>Profile</h3>
        </div>
        <div class="card-body">
            <section style="background-color: #eee;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ URL::asset('assets/images/student.png') }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 style="font-family: Cairo" class="my-3">{{ $data->name }}</h5>
                                <p class="text-muted mb-1">{{ $data->email }}</p>
                                <p class="text-muted mb-4">Student</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('student.profile.update', $data->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0"> Arabic name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="text" name="name_ar"
                                                    value="{{ $data->getTranslation('name', 'ar') }}" class="form-control">
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0"> English name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="text" name="name_en"
                                                    value="{{ $data->getTranslation('name', 'en') }}" class="form-control">
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">password </p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <input type="password" id="password" class="form-control" name="password">
                                            </p><br><br>
                                            <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                                id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"> show password </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-success">update </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- row closed -->
@endsection
@section('js')
    {{-- @toastr_js
    @toastr_render --}}
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
