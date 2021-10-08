<aside class="left-sidebar">
    <ul id="slide-out" class="sidenav">
        <li>
            <ul class="collapsible p-t-30">
                <li>
                    <a href="{{route('dashboard')}}" class="collapsible-header">
                        <i class="material-icons">dashboard</i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('categories.index')}}" class="collapsible-header">
                        <i class="material-icons">assignment</i>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('suppliers.index')}}" class="collapsible-header">
                        <i class="material-icons">group</i>
                        <span class="hide-menu">Suppliers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('purchases.index')}}" class="collapsible-header">
                        <i class="material-icons">add_shopping_cart</i>
                        <span class="hide-menu">Purchases</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('products.index')}}" class="collapsible-header">
                        <i class="material-icons">business_center</i>
                        <span class="hide-menu">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('customers.index')}}" class="collapsible-header">
                        <i class="material-icons">group</i>
                        <span class="hide-menu">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('backup.index')}}" class="collapsible-header">
                        <i class="material-icons">backup</i>
                        <span class="hide-menu">Backups</span>
                    </a>
                </li>

                <li>
                    <a class="collapsible-header has-arrow"><i class="material-icons">verified_user</i><span class="hide-menu">Authentication</span></a>
                    <div class="collapsible-body">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <a href="{{route('users.index')}}">
                                    <i class="material-icons">group</i>
                                    <span class="hide-menu">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('roles.index')}}">
                                    <i class="material-icons">person</i>
                                    <span class="hide-menu">Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('permissions.index')}}">
                                    <i class="material-icons">person</i>
                                    <span class="hide-menu">Permissions</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="collapsible-header has-arrow"><i class="material-icons">clear_all</i><span class="hide-menu">Multi Levels</span></a>
                    <div class="collapsible-body">
                        <ul class="collapsible" data-collapsible="accordion">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="material-icons">grade</i>
                                    <span class="hide-menu">Second level</span>
                                </a>
                            </li>
                            <li>
                                <a class="collapsible-header has-arrow">
                                    <i class="material-icons">looks_two</i>
                                    <span class="nav-text">Second level child</span>
                                </a>
                                <div class="collapsible-body">
                                    <ul class="collapsible" data-collapsible="accordion">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="material-icons">grade</i>
                                                <span class="hide-menu">Third level</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="collapsible-header has-arrow">
                                                <i class="material-icons">looks_3</i>
                                                <span class="hide-menu">Third level child</span>
                                            </a>
                                            <div class="collapsible-body">
                                                <ul class="collapsible" data-collapsible="accordion">
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="material-icons">grade</i>
                                                            <span class="hide-menu">Forth level</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <i class="material-icons">grade</i>
                                                            <span class="hide-menu">Forth level</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button class="btn collapsible-header" type="submit"><i class="material-icons">power_settings_new</i><span class="hide-menu"> Log Out </span></button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</aside>