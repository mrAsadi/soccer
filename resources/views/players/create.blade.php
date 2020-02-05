@extends('layout.app')

@section('content')
    <div class="content">
        <form class="player-form">

            <div class="upload-area">
                <img class="img-thumbnail" src="{{asset('img/profile.svg')}}" alt="">
                <img class="img-upload" src="{{asset('img/camera.svg')}}" alt="">
            </div>

            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="lastname" name="lastname">
            <input type="number" placeholder="age" name="age">
            <input type="number" placeholder="height" name="height">
            <input type="number" placeholder="wight" name="weight">

            <textarea name="description" cols="30" placeholder="description" rows="10"></textarea>



            <input type="text" placeholder="teams" name="teams">

            <div class="submit-area">
                <img src="{{asset('img/submit.svg')}}" alt="">
                <img src="{{asset('img/delete.svg')}}" alt="">
            </div>


        </form>
    </div>
@endsection
