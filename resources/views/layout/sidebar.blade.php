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
                    <a href="/teams">teams</a>
                </li>

                <li>
                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>

</div>
