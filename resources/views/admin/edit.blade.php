@extends('layouts.admin.main')
@section('meta-title', 'Edit')

@section('content')

@section('content-title', 'Edit User')

@livewire('edit-user-form', ['user' => $user])
@endsection