@extends('layouts.master')
@section('title')
    graduated students
@endsection


@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        @livewire('graduation-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
