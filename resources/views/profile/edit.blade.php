@extends('layouts.app', ['breadcrumbs' => ['My profile']])
@section('title', 'My Profile')
@section('main')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        @include('profile.partials.update-profile-information-form', ['user', $user])
        @include('profile.partials.update-password-form', ['user', $user])
        {{-- @include('profile.partials.delete-user-form', ['user', $user]) --}}
    </div>
</div>
@endsection