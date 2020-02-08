@extends('layout.app')

@section('content')
    <div class="content">

        <form id="player-form" class="player-form" method="post" action="{{ URL::route('teams.store') }}" enctype="multipart/form-data">

            {!! csrf_field() !!}

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
                <img id="thumbnail" class="img-thumbnail" src="{{asset('img/profile.svg')}}" alt="">
                <img id="thumbnail-cam" class="img-upload" src="{{asset('img/camera.svg')}}" alt="">
            </div>

            <input type="text" placeholder="name" name="name" value="{{ old('name') }}">
            <input type="text" placeholder="title" name="title" value="{{ old('title') }}">
            <textarea name="description" cols="30" placeholder="description" rows="10">{{ old('description') }}</textarea>

            <input id="items" type="hidden" name="players" >
            @component('Components.selector',['items'=>$players])@endcomponent

            <div class="submit-area">
                <img id="submit-form" src="{{asset('img/submit.svg')}}" alt="">
            </div>




        </form>
    </div>
@endsection
