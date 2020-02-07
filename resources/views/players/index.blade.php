@extends('layout.app')

@section('content')
    <div  v-cloak class="content">

        <div class="table">
            <p class="success-message">
                <a class="new-player" href="/players/create">Create New Player</a>
                <span style="display: block;">{{ Session::get('message') }}</span>
            </p>

            <div class="tr" v-for="player in players">

                <div class="header">

                    <div class="fields">
                        <img  :src="player.thumbnail" alt="">
                        <span>@{{player.name}}</span>
                    </div>

                    <div class="operations">
                        <a href=""> <img src="{{asset('img/edit.svg')}}" alt=""></a>

{{--                        <form id="delete-form" action="{{ URL::route('players.destroy', 1 )}}" method="POST" style="display: none;">--}}
                        <form id="delete-form" :action="deletebyid(player.id)" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        <a href="#" onclick="event.preventDefault(); if(confirm('are you sure?')) document.getElementById('delete-form').submit();"> <img src="{{asset('img/del.svg')}}" alt=""></a>


                    </div>
                </div>
                <div class="body">

                    <div class="player-info">
                        <div class="col">
                            <span class="age">Age : </span> <span class="age">@{{ player.age }}</span>
                        </div>

                        <div class="col">
                            <span class="height">Height : </span><span class="height">@{{ player.height }}</span>
                        </div>

                        <div class="col">
                            <span class="weight">Weight : </span> <span class="weight">@{{ player.weight }}</span>
                        </div>
                    </div>

                    <div class="bio">
                        <h2>Bio</h2>
                        <p>@{{ player.description }}</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>

        const app = new Vue({
            el: '#app',
            data:{
                players :JSON.parse({!! json_encode($players) !!}),
            },
            created:function () {

            },
            methods:{
                deletebyid(id){
                    return 'players/'+id;
                }
            }
        });

    </script>
@endsection
