@extends('layout.app')

@section('content')
    <div class="content">
        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif


            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="password" name="password">
            <button type="submit">login</button>
        </form>

    </div>
@endsection

