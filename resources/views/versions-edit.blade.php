@extends('layouts.main')

@section('title')
    Edit
@endsection

@section('content')
    <form action="{{ url('/versions/store', $version->id) }}" method="POST">
        @csrf
        <div class="head-2col">
            <div class="head-2col__left">
                <h1>Edit Version - {{ $version->name }}</h1>
            </div>
            <div class="head-2col__right">
                <button class="btn-primary" type="submit">Save</button>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $version->name }}">
        </div>
        <div class="form-group">
            <label for="name">Branch</label>
            <select name="branch">
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
@endsection