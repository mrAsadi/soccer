@extends('layout.app')

@section('content')
    <div class="content">
        <form id="player-form" class="player-form" method="post" action="{{ URL::route('players.update', $player->id )}}" enctype="multipart/form-data">

            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="patch">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            @if ($errors->has('lastname'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastname') }}</strong>
                </span>
            @endif

            @if ($errors->has('age'))
                <span class="help-block">
                    <strong>{{ $errors->first('age') }}</strong>
                </span>
            @endif

            @if ($errors->has('height'))
                <span class="help-block">
                    <strong>{{ $errors->first('height') }}</strong>
                </span>
            @endif

            @if ($errors->has('weight'))
                <span class="help-block">
                    <strong>{{ $errors->first('weight') }}</strong>
                </span>
            @endif

            @if ($errors->has('thumbnail'))
                <span class="help-block">
                    <strong>{{ $errors->first('thumbnail') }}</strong>
                </span>
            @endif

            <div class="upload-area">
                <input type='file' onchange=""  name="thumbnail" accept="image/*"  id="thumbnail-file" style="display: none;"  />
                <img id="thumbnail" class="img-thumbnail" src="{{$player->thumbnail}}" alt="">
                <img id="thumbnail-cam" class="img-upload" src="{{asset('img/camera.svg')}}" alt="">
            </div>

            <div class="input-area">
                <input type="text" placeholder="name" name="name" value="{{old('name')? old('name') :$player->name}}">
                <input type="text" placeholder="lastname" name="lastname" value="{{old('lastname')? old('lastname'): $player->lastname }}">
                <input type="number" placeholder="age" name="age" value="{{ old('age') ? old('age')  : $player->age }}">
                <input type="number" placeholder="height" name="height" value="{{old('height')? old('height') : $player->height }}">
                <input type="number" placeholder="wight" name="weight" value="{{ old('weight')? old('weight') : $player->weight }}">
            </div>

            <div class="edit-area">
                <textarea name="description" cols="30" placeholder="description" rows="10" >{{ old('description')? old('description') : $player->description}}</textarea>
            </div>

            <input id="items" type="hidden" name="teams" >
            @component('Components.selector',['items'=>$teams])@endcomponent

            <div class="submit-area">
                <img id="submit-form" src="{{asset('img/submit.svg')}}" alt="">
            </div>


        </form>
    </div>
@endsection
