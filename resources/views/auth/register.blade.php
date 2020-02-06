@extends('layout.app')

@section('content')
    <div class="content">
        <form method="post" action="{{ url('/register') }}">
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

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif


            <input type="text" placeholder="username" name="username" value="{{ old('username') }}">
            <input type="password" placeholder="password" name="password">
            <input type="password" placeholder="confirm password" name="password_confirmation">
            <input type="email" placeholder="email" name="email" value="{{ old('email') }}">
            <button type="submit">register</button>
        </form>
    </div>
@endsection

