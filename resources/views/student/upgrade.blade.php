@extends('layouts.master')

@section('title')
    Students upgrades

    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    @livewire('upgrade-students', ['grades' => $grades])

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection
