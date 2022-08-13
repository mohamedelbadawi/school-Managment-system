@extends('layouts.master')
@section('content')
    {{-- @dd($classroom) --}}
    @livewire('attendance', ['classroom' => $classRoom])
@endsection
