@extends('layout.app')

@section('content')
    <div class="content">
        <form class="player-form">

            <div class="upload-area">
                <img class="img-thumbnail" src="{{asset('img/profile.svg')}}" alt="">
                <img class="img-upload" src="{{asset('img/camera.svg')}}" alt="">
            </div>

            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="title" name="title">
            <textarea name="description" cols="30" placeholder="description" rows="10"></textarea>


            <input type="text" placeholder="players" name="players">

            <div class="submit-area">
                <img src="{{asset('img/submit.svg')}}" alt="">
                <img src="{{asset('img/del.svg')}}" alt="">
            </div>


        </form>
    </div>
@endsection
