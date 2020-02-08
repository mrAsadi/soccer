@extends('layout.app')

@section('content')
    <div v-cloak class="content">

        <div class="team-item" v-for="team in teams">
            <img :src="team.thumbnail" alt="team-logo">
            <span class="team-img-shadow"></span>
            <h1>@{{ team.name }}</h1>
            <ul>

                <li v-for="member in team.members" :style="changeStyle(member.thumbnail)"></li>


            </ul>
            <a :href="linkbyid(team.id)">more</a>
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
                console.log(this.teams);
            },
            methods:{
                linkbyid(id){
                    return 'teams/'+id;
                },

                editbyid(id){
                    return 'teams/'+id+'/edit';
                },
                changeStyle(image){
                  return 'background: url('+image+') no-repeat center/cover';
                }
            }
        });

    </script>
@endsection
