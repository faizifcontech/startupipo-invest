<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a href="{{ action('AgentController@index') }}"><i class="icon-compass mr-10"></i>Dashboard</a>
        </li>
        <li>
            <a href="{{ action('AgentController@profileIndex') }}"><i class="icon-settings mr-10"></i>Edit Details</a>
        </li>
        <li>
            <a href="{{ action('AgentController@addBank') }}"><i class="icon-wallet mr-10"></i>Bank Info</a>
        </li>
        <li>
            <a href="{{ action('AgentController@userList') }}"><i class="icon-user-follow mr-10"></i>User List</a>
        </li>
        <li>
            <a href="{{ action('AgentProfitController@depositList') }}"><i class="ti-arrow-down mr-10"></i>All Deposit</a>
        </li>
        <li>
            <a href="{{ action('AgentProfitController@withdrawalList') }}"><i class="ti-arrow-up mr-10"></i>All Withdrawal</a>
        </li>
        <li>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out mr-10"></i>Log out</a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</div>
<!-- /Left Sidebar Menu -->
