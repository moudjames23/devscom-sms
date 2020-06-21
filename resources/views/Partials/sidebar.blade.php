<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">


                    <ul id="mainnav-menu" class="list-group">

                        <!--Category name-->
                        <li class="list-header">Navigation</li>

                        <!--Menu list item-->
                        <li class="{{ Request::is('admin') ? 'active-link' : '' }}">
                            <a href="{{url('/')}}">
                                <i class="demo-psi-home"></i>
                                <span class="menu-title">
                                    <strong>Tableau de bord</strong>
                                </span>
                            </a>
                        </li>


                        <li>
                            <a href="#">
                                <i class="demo-psi-home"></i>
                                <span class="menu-title">Utilisateurs</span>
                                <i class="arrow"></i>
                            </a>


                            <ul class="collapse">


                                @can('see', App\User::class)
                                    <li class="{{ Request::is('admin/user') ? 'active-link' : '' }}">
                                        <a href="{{route('user.index')}}">
                                            <i class="demo-psi-home"></i>
                                            <span class="menu-title">
                                            <strong>Liste</strong>
                                        </span>
                                        </a>
                                    </li>
                                @endcan



                                @can('see', App\Role::class)
                                    <li class="{{ Request::is('admin/role') ? 'active-link' : '' }}">
                                        <a href="{{route('role.index')}}">
                                            <i class="demo-psi-home"></i>
                                            <span class="menu-title">
                                            <strong>Role</strong>
                                        </span>
                                        </a>
                                    </li>
                                @endcan


                            </ul>
                        </li>


                        {{-- Fournisseur --}}


                    </ul>


                </div>
            </div>
        </div>

    </div>
</nav>