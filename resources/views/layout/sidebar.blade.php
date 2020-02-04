<div class="sidebar-wrapper">

        <ul>
            <li>
                <a href="/">home</a>
            </li>
            @if (Auth::guest())
            <li>
                <a href="/login">login</a>
            </li>
            <li>
                <a href="/register">register</a>
            </li>
            @else
                <li>
                    <a href="/players">players</a>
                </li>
                <li>
                    <a href="/register">teams</a>
                </li>
            @endif
        </ul>

</div>
