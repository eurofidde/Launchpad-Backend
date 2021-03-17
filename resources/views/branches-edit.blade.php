@extends('layouts.main')

@section('title')
    Edit Branch
@endsection

@section('content')
    <form method="POST" action="{{ url('/branches/store', $branch->id) }}">
        @csrf
        <div class="head-2col">
            <div class="head-2col__left">
                <h1>Edit Branch - {{ $branch->name }}</h1>
            </div>
            <div class="head-2col__right">
                <button class="btn-primary" type="submit">Save</button>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" value="{{ $branch->name }}">
        </div>
    </form>
@endsection