<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="{{url('/')}}" class="navbar-brand">
                <!--<img src="img/logo.png" alt="Nifty Logo" class="brand-icon">-->
                <div class="brand-title">
                    <span class="brand-text">{{ config('app.name') }}</span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-view-list"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->



            </ul>
            <ul class="nav navbar-top-links pull-right">

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <i class="demo-pli-male ic-user"></i>
                                </span>
                        <div class="username hidden-xs">
                            @if(Auth::user()->personnel)
                                {{ Auth::user()->personnel->full_name }}
                            @endif
                        </div>
                    </a>


                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                        <!-- User dropdown menu -->
                        <ul class="head-list">
                            <li>
                                <a href="{{ route('password') }}">
                                    <i class="demo-pli-male icon-lg icon-fw"></i> Changer de mot de passe
                                </a>
                            </li>
                        </ul>

                        <!-- Dropdown footer -->
                        <div class="pad-all text-right">
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                <i class="demo-pli-unlock"></i> Se déconnecter
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>