@extends('layout.app')

@section('content')
    <div class="content">
        <div class="team-wrapper">
            <img src="{{asset('img/team1.png')}}" alt="">
            <h1>Barcelona</h1>
            <h2>It's turn on us now...</h2>
            <p>
                lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.lorem ipsum is placeholder .lorem ipsum is.
            </p>

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
