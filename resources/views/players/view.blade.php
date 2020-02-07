@extends('layout.app')

@section('content')
    <div class="content">
        <div class="player-wrapper">
            <img src="{{ $player->thumbnail }}" alt="">

            <h3>{{$player->name.' '. $player->lastname}}</h3>

            <span>Age : {{$player->age}} </span>
            <span>Height : {{$player->height}} m </span>
            <span>Weight : {{$player->weight}} kg</span>
            <p>{{$player->description}}</p>

            <h3>Teams</h3>
            <div class="teams-section">

                <div class="teams-section-item">
                    <div class="player-detail-image" style="background: url({{asset('img/team1.png')}}) no-repeat center/cover"></div>
                    <span>Barcelona</span>
                </div>

                <div class="teams-section-item">
                    <div class="player-detail-image" style="background: url({{asset('img/team1.png')}}) no-repeat center/cover"></div>
                    <span>Barcelona</span>
                </div>

                <div class="teams-section-item">
                    <div class="player-detail-image" style="background: url({{asset('img/team1.png')}}) no-repeat center/cover"></div>
                    <span>Barcelona</span>
                </div>


            </div>
        </div>
    </div>
@endsection
