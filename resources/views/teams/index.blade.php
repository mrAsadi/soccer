@extends('layout.app')

@section('content')
    <div class="content">
        <div class="table">

            <div class="tr">
                <div class="header">

                    <div class="fields">
                        <img src="{{asset('img/team1.png')}}" alt="">
                        <span>Barcelona</span>
                    </div>

                    <div class="operations">
                        <a href=""> <img src="{{asset('img/edit.svg')}}" alt=""></a>
                        <a href=""> <img src="{{asset('img/del.svg')}}" alt=""></a>

                    </div>
                </div>
                <div class="body">

                    <div class="intro">
                        <h2>Title</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    </div>

                    <div class="bio">
                        <h2>Intro</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam deserunt ducimus ex fugit id inventore ipsum magni mollitia natus neque nihil pariatur quod recusandae reprehenderit, sapiente veniam, vero, voluptatibus. Tempora!</p>
                    </div>

                </div>
            </div>

            <div class="tr">
                <div class="header">

                    <div class="fields">
                        <img src="{{asset('img/team1.png')}}" alt="">
                        <span>Barcelona</span>
                    </div>

                    <div class="operations">
                        <a href=""> <img src="{{asset('img/edit.svg')}}" alt=""></a>
                        <a href=""> <img src="{{asset('img/del.svg')}}" alt=""></a>

                    </div>
                </div>
                <div class="body">

                    <div class="intro">
                        <h2>Title</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    </div>

                    <div class="bio">
                        <h2>Intro</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam deserunt ducimus ex fugit id inventore ipsum magni mollitia natus neque nihil pariatur quod recusandae reprehenderit, sapiente veniam, vero, voluptatibus. Tempora!</p>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
