@extends('layout.app')

@section('content')
    <div class="content">
        <form action="">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="password" name="password">
            <input type="password" placeholder="confirm password" name="c_password">
            <input type="email" placeholder="email" name="email">
            <button type="submit">register</button>
        </form>
    </div>
@endsection

