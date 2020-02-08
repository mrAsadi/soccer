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

                @foreach($player->teams as $team)

                    <div class="teams-section-item">
                        <div class="player-detail-image" style="background: url({{$team->thumbnail}}) no-repeat center/cover"></div>
                        <span><a href="{{URL::route('teams.show',$team->id)}}">{{$team->name}}</a></span>

                    </div>

                @endforeach


            </div>
        </div>
    </div>
@endsection
