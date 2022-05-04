@extends('layouts.admin.main')
@section('meta-title', 'Home')

@section('content')

@section('content-title', 'Current Users')

@livewire('users-table')


@endsection