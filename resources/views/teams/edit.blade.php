@extends('layout.app')

@section('content')
    <div class="content">

        <form id="player-form" class="player-form" method="post" action="{{ URL::route('teams.update',$team->id) }}" enctype="multipart/form-data">

            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="patch">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif

            @if ($errors->has('thumbnail'))
                <span class="help-block">
                    <strong>{{ $errors->first('thumbnail') }}</strong>
                </span>
            @endif

            <div class="upload-area">
                <input type='file' onchange=""  name="thumbnail" accept="image/*"  id="thumbnail-file" style="display: none;"  />
                <img id="thumbnail" class="img-thumbnail" src="{{$team->thumbnail}}" alt="">
                <img id="thumbnail-cam" class="img-upload" src="{{asset('img/camera.svg')}}" alt="">
            </div>

            <input type="text" placeholder="name" name="name"  value="{{old('name')? old('name') :$team->name}}">
            <input type="text" placeholder="title" name="title"  value="{{old('title')? old('title') :$team->title}}">
            <textarea name="description" cols="30" placeholder="description" rows="10">{{old('description')? old('description') :$team->description}}</textarea>


            <input type="text" placeholder="players" name="players">

            <div class="submit-area">
                <img id="submit-form" src="{{asset('img/submit.svg')}}" alt="">
            </div>


        </form>
    </div>
@endsection
