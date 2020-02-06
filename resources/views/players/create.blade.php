@extends('layout.app')

@section('content')
    <div class="content">
        <form id="player-form" class="player-form" method="post" action="{{ url('/players/store') }}" enctype="multipart/form-data">

            {!! csrf_field() !!}

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

            <div class="input-area">
                <input type="text" placeholder="name" name="name" value="{{ old('name') }}">
                <input type="text" placeholder="lastname" name="lastname" value="{{ old('lastname') }}">
                <input type="number" placeholder="age" name="age" value="{{ old('age') }}">
                <input type="number" placeholder="height" name="height" value="{{ old('height') }}">
                <input type="number" placeholder="wight" name="weight" value="{{ old('weight') }}">
            </div>

            <div class="edit-area">
                <textarea name="description" cols="30" placeholder="description" rows="10" value="{{ old('description') }}"></textarea>
                <input type="text" placeholder="teams" name="teams" value="{{ old('teams') }}">
            </div>


            <div class="submit-area">
                <img id="submit-form" src="{{asset('img/submit.svg')}}" alt="">
                <img src="{{asset('img/delete.svg')}}" alt="">
            </div>


        </form>
    </div>
@endsection

@section('script')
    <script>

        const fileinput = document.getElementById('thumbnail-file');
        const myimg = document.getElementById('thumbnail');
        const camimg = document.getElementById('thumbnail-cam');
        const submitter = document.getElementById('submit-form');
        const myform = document.getElementById('player-form');


        submitter.addEventListener('click', () => {
            myform.submit();
        });

        myimg.addEventListener('click', () => {
            fileinput.click();
        });

        camimg.addEventListener('click', () => {
            fileinput.click();
        });

        fileinput.addEventListener('change', () => {

            if (fileinput.files && fileinput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    myimg.src = e.target.result;
                }
                reader.readAsDataURL(fileinput.files[0]);
            }

        })

    </script>
@endsection
