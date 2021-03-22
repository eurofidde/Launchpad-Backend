@extends('layouts.main')

@section('title')
    Versions
@endsection

@section('content')
    <div class="head-2col">
        <div class="head-2col__left">
            <h1>Versions</h1>
        </div>
        <div class="head-2col__right">
            <button class="btn-primary" id="popup-box-open-btn">Create</button>
        </div>
    </div>
    <table cellspacing="0">
        <tr>
            <th class="id">ID</th>
            <th>Name</th>
            <th>Branch ID</th>
            <th>Creation Date</th>
            <th>Last Updated</th>
            <th></th>
        </tr>
        @foreach ($versions as $version)
            <tr>
                <td class="id">{{ $version->id }}</td>
                <td>{{ $version->name }}</td>
                <td>{{ $version->branch_id }}</td>
                <td>{{ $version->created_at }}</td>
                <td>{{ $version->updated_at }}</td>
                <td class="action">
                    <div class="dropdown">
                        <button class="fas fa-ellipsis-h"></button>
                        <div class="dropdown__content">
                            <a href="{{ url('/versions/edit', $version->id) }}">Edit</a>
                            <a onclick="event.preventDefault(); document.getElementById('delete-form-{{ $version->id }}').submit();">Delete</a>
                        </div>
                    </div>
                </td>

                <!-- Delete Form -->
                <form id="delete-form-{{ $version->id }}" action="{{ url('/versions/delete', $version->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <!-- /Delete Form -->
            </tr>
        @endforeach
    </table>

    <!-- Create -->
    <div class="popup-box" id="popup-box">
        <div class="popup-box__inner">
            <button class="popup-box__cancel-btn" id="popup-box-close-btn">
                <i class="fas fa-times"></i>
            </button>
            <form method="POST" action="{{ url('/versions/create') }}">
                @csrf
                <div class="popup-box__content">
                    <i class="fas fa-plus"></i>
                    <h2>Create New Version</h2>
                    <input name="name" type="text" placeholder="Name">
                </div>
                <button class="popup-box__btn">Create</button>
            </form>
        </div>
    </div>
    <!-- /Create -->
@endsection