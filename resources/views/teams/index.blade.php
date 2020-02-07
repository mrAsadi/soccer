@extends('layout.app')

@section('content')
    <div v-cloak class="content">
        <div class="table">

            <p class="success-message">
                <a class="new-player" href="/teams/create">Create New Team</a>
                <span style="display: block;">{{ Session::get('message') }}</span>
            </p>

            <div class="tr" v-for="team in teams">
                <div class="header">

                    <div class="fields">
                        <img :src="team.thumbnail" alt="">
                        <span>@{{team.name}}</span>
                    </div>

                    <div class="operations">
                        <a :href="editbyid(team.id)"> <img src="{{asset('img/edit.svg')}}" alt=""></a>

                        <form id="delete-form" :action="deletebyid(team.id)" method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                        <a href="#" onclick="event.preventDefault(); if(confirm('are you sure?')) document.getElementById('delete-form').submit();"> <img src="{{asset('img/del.svg')}}" alt=""></a>


                    </div>
                </div>
                <div class="body">

                    <div class="intro">
                        <h2>Title</h2>
                        <p>@{{ team.title }}</p>
                    </div>

                    <div class="bio">
                        <h2>Intro</h2>
                        <p>@{{ team.description }}</p>
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
                 teams :JSON.parse({!! json_encode($teams) !!}),
            },
            created:function () {

            },
            methods:{
                deletebyid(id){
                    return 'teams/'+id;
                },

                editbyid(id){
                    return 'teams/'+id+'/edit';
                }
            }
        });

    </script>
@endsection
