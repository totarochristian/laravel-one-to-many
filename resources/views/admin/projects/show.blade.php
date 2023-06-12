@extends('layouts.admin')

@section('content')
    <h1>{{ $project->title }}</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <img src="{{ $project->image }}" alt="{{ $project->title }}">
    <p>{!! $project->body !!}</p>
@endsection
