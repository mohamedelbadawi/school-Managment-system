@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
@section('title')
    Add parents
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @livewire('add-parent-data')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/fileinput.min.js"
    integrity="sha512-C9i+UD9eIMt4Ufev7lkMzz1r7OV8hbAoklKepJW0X6nwu8+ZNV9lXceWAx7pU1RmksTb1VmaLDaopCsJFWSsKQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $("#images").fileinput({
        theme: 'fa',
        uploadUrl: "",
        removeUrl: "",
        allowedFileExtensions: ['jpg', 'png'],
        overwriteInitial: false,
        maxFileSize: 2000,
        maxFilesNum: 5,
    });
</script>
@endsection
