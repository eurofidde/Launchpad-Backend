@extends('layouts.main')

@section('title')
    Branches
@endsection

@section('content')
    <div class="head-2col">
        <div class="head-2col__left">
            <h1>Branches</h1>
        </div>
        <div class="head-2col__right">
            <button class="btn-primary" id="popup-box-open-btn">Create</button>
        </div>
    </div>
    <table cellspacing="0">
        <tr>
            <th class="id">ID</th>
            <th>Name</th>
            <th>Creation Date</th>
            <th>Last Updated</th>
            <th></th>
        </tr>
        @foreach ($branches as $branch)
            <tr>
                <td class="id">{{ $branch->id }}</td>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->created_at }}</td>
                <td>{{ $branch->updated_at }}</td>
                <td class="action">
                    <div class="dropdown">
                        <button class="fas fa-ellipsis-h"></button>
                        <div class="dropdown__content">
                            <a href="{{ url('/branches/edit', $branch->id) }}">Edit</a>
                            <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $branch->id }}').submit();">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

            <!-- Delete Form -->
            <form id="delete-form-{{ $branch->id }}" action="{{ url('/branches/delete', $branch->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <!-- /Delete Form -->
        @endforeach
    </table>

    <!-- Create -->
    <div class="popup-box" id="popup-box">
        <div class="popup-box__inner">
            <button class="popup-box__cancel-btn" id="popup-box-close-btn">
                <i class="fas fa-times"></i>
            </button>
            <form method="POST" action="{{ url('/branches/create') }}">
                @csrf
                <div class="popup-box__content">
                    <i class="fas fa-plus"></i>
                    <h2>Create New Branch</h2>
                    <input name="name" type="text" placeholder="Name">
                </div>
                <button class="popup-box__btn">Create</button>
            </form>
        </div>
    </div>
    <!-- /Create -->
@endsection