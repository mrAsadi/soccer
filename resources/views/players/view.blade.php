@extends('layout.app')

@section('content')
    <div class="content">
        <div class="player-wrapper">
            <img src="{{asset('img/u1.jpg')}}" alt="">

            <h3>Mohammad Salah</h3>

            <span>Age : 22 </span>
            <span>Height : 1.76 m </span>
            <span>Weight : 74 kg</span>


            <p>
                lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups. lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.lorem ipsum is placeholder .lorem ipsum is.
            </p>

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
