<div class="multi-select">

    <div class="team-select-search">
        <input type="text" name="search" id="search" placeholder="search teams...">
    </div>

    <div class="team-select-items">

        @foreach($items as $item )
            @if($item->selected)
                <div class="team-select-item selected-team" onclick="toggle_selection(this)">
                    <input type="hidden" value="{{$item->id}}">
                    <img class="team-image" src="{{$item->thumbnail}}" alt="">
                    <p>{{$item->name}}</p>
                </div>
            @else
                <div class="team-select-item" onclick="toggle_selection(this)">
                    <input type="hidden" value="{{$item->id}}">
                    <img class="team-image" src="{{$item->thumbnail}}" alt="">
                    <p>{{$item->name}}</p>
                </div>
            @endif
        @endforeach

    </div>

</div>

<script>

    function toggle_selection(e) {
        e.classList.toggle('selected-team');
    }
</script>
