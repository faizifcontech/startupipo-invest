<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a href="{{ action('AgentController@index') }}"><i class="ti-clipboard mr-10"></i>Dashboard</a>
        </li>
        <li>
            <a href="{{ action('AgentController@addBank') }}"><i class="ti-clipboard mr-10"></i>Bank Info</a>
        </li>
        <li>
            <a href="{{ action('AgentProfitController@depositList') }}"><i class="ti-clipboard mr-10"></i>All Deposit</a>
        </li>
        <li>
            <a href="{{ action('AgentController@userList') }}"><i class="ti-clipboard mr-10"></i>User List</a>
        </li>
        <li>
            <a href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out mr-10"></i>Log out</a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><i class="icon-arrow-down-circle mr-10"></i>Dropdown leavel 1<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown leavel 2<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
                    <ul id="dropdown_dr_lv2" class="collapse collapse-level-2">
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                        <li>
                            <a href="#">Dropdown Item</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- /Left Sidebar Menu -->
