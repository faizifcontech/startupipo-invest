<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li>
            <a href="{{ action('AdminController@index') }}"><i class="ti-clipboard mr-10"></i>Dashboard</a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#manageAgent"><i
                        class="icon-arrow-down-circle mr-10"></i>Manage Agent<span class="pull-right"><i
                            class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="manageAgent" class="collapse collapse-level-1">
                <li>
                    <a href="{{ action('Admin\AgentsetController@create') }}">Add Agent </a>
                </li>
                <li>
                    <a href="{{ action('Admin\AgentsetController@index') }}">Agent List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#manageUser"><i
                        class="icon-arrow-down-circle mr-10"></i>Manage User<span class="pull-right"><i
                            class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="manageUser" class="collapse collapse-level-1">
                <li>
                    <a href="#">User List</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{   action('AdminController@shareIndex') }}"><i class="icon-doc mr-10"></i>Share Amount</a>
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
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><i
                        class="icon-arrow-down-circle mr-10"></i>Dropdown leavel 1<span class="pull-right"><i
                            class="fa fa-fw fa-angle-down"></i></span></a>
            <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="#">Dropdown Item</a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown leavel
                        2<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
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
