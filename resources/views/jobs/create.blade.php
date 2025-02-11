@extends('layout')

@section('title', 'Workopia | Create a job')

@section('content')
    <h1>Create a job</h1>
    <form action="/jobs" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Submit</button>
    </form>
@endsection
