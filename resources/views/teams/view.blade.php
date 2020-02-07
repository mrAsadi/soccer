@extends('layout.app')

@section('content')
    <div class="content">
        <div class="team-wrapper">
            <img src="{{ $team->thumbnail }}" alt="">
            <h1>{{$team->name}}</h1>
            <h2>{{$team->title}}</h2>
            <p>{{$team->description}}</p>

            <h3>Players</h3>
            <div class="players-section">

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

                <div class="player-item">
                    <div class="player-detail-image" style="background: url({{asset('img/u1.jpg')}}) no-repeat center/cover"></div>
                    <span>Juan Alba</span>
                </div>

            </div>
        </div>
    </div>
@endsection
