@extends('layout.app')

@section('content')
    <div class="content">





        <div class="table">
            <p class="success-message">
                <a class="new-player" href="/players/create">Create New Player</a>
                <span style="display: block;">{{ Session::get('message') }}</span>
            </p>

            <div class="tr">
                <div class="header">

                    <div class="fields">
                        <img src="{{asset('img/u1.jpg')}}" alt="">
                        <span>Mohammad Salah</span>
                    </div>

                    <div class="operations">
                        <a href=""> <img src="{{asset('img/edit.svg')}}" alt=""></a>
                        <a href=""> <img src="{{asset('img/del.svg')}}" alt=""></a>

                    </div>
                </div>
                <div class="body">

                    <div class="player-info">
                        <div class="col">
                            <span class="age">Age : </span> <span class="age">26</span>
                        </div>

                        <div class="col">
                            <span class="height">Height : </span><span class="age">1.8</span>
                        </div>

                        <div class="col">
                            <span class="weight">Weight : </span> <span class="weight">75</span>
                        </div>
                    </div>

                    <div class="bio">
                        <h2>Bio</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam deserunt ducimus ex fugit id inventore ipsum magni mollitia natus neque nihil pariatur quod recusandae reprehenderit, sapiente veniam, vero, voluptatibus. Tempora!</p>
                    </div>

                </div>
            </div>

            <div class="tr">
                <div class="header">

                    <div class="fields">
                        <img src="{{asset('img/u1.jpg')}}" alt="">
                        <span>Mohammad Salah</span>
                    </div>

                    <div class="operations">
                        <a href=""> <img src="{{asset('img/edit.svg')}}" alt=""></a>
                        <a href=""> <img src="{{asset('img/del.svg')}}" alt=""></a>

                    </div>
                </div>
                <div class="body">

                    <div class="player-info">
                        <div class="col">
                            <span class="age">Age : </span> <span class="age">26</span>
                        </div>

                        <div class="col">
                            <span class="height">Height : </span><span class="age">1.8</span>
                        </div>

                        <div class="col">
                            <span class="weight">Weight : </span> <span class="weight">75</span>
                        </div>
                    </div>

                    <div class="bio">
                        <h2>Bio</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam deserunt ducimus ex fugit id inventore ipsum magni mollitia natus neque nihil pariatur quod recusandae reprehenderit, sapiente veniam, vero, voluptatibus. Tempora!</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
