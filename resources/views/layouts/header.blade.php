            @section('header')
            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="active">
                                <a href="{{ route('home') }}">
                                    <i class="far fa-check-square"></i>Daftar Kantor</a>
                            </li>
                            <li>
                                <a href="{{ route('attendance') }}">
                                    <i class="fas fa-chart-bar"></i>Daftar Absen</a>
                            </li>
                            <li>
                                <a href="{{ route('employee') }}">
                                    <i class="fas fa-table"></i>Daftar Karyawan</a>
                            </li>
                            <li>
                                <a href="{{ route('user') }}">
                                    <i class="fas fa-table"></i>Daftar User</a>
                            </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            @endsection