@extends('layouts.master')
@section('title')
    classroom graduation
@endsection
@section('content')
    <form action="{{ route('upgrade.graduate') }}" method="post" class="form">
        @csrf
        @livewire('student-dropdown', ['grades' => $grades])

        <div class="d-flex justify-content-center mt-3">

            <button type="submit" class="btn btn-success ">graduate</button>
        </div>
    </form>
@endsection
