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

                @foreach($team->members as $member)
                    <div class="player-item">
                        <div class="player-detail-image" style="background: url({{$member->thumbnail}}) no-repeat center/cover"></div>
                        <span><a href="{{URL::route('players.show',$member->id)}}">{{$member->name}}</a></span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
