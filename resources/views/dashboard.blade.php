@extends('layouts.main')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="dashboard-stats">
        <h2>Stats:</h2>
        <div class="dashboard-stats__grid">
            <div class="dashboard-stats__item">
                <i class="fas fa-gavel"></i>
                <h3>Versions</h3>
            </div>
            <div class="dashboard-stats__item">
                <i class="fas fa-box"></i>
                <h3>Branches</h3>
            </div>
        </div>
    </section>

    <section class="dashboard-updates">
        <h2>Updates:</h2>
        
    </section>
@endsection