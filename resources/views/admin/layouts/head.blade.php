        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        {{-- <span class="logo-icon material-icons">store_mall_directory</span> --}}
                        <span class="logo-default">Gudangbaja</span> 
                    </a>
                </div>
                <!-- logo end -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a class="fullscreen-btn">
                                <i class="fa fa-arrows-alt"></i>
                            </a>
                        </li>
                        
                        <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge headerBadgeColor1"> 6 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                    <span class="notification-label purple-bgcolor">New 6</span>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                    <span class="notification-icon circle deepPink-bgcolor"><i
                                                            class="fa fa-check"></i></span>
                                                    Congratulations!. </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)"> All notifications </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end notification dropdown -->
        
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="Photo Profil {{ auth()->user()->nama }}" class="img-circle " src="{{ asset('storage/'. auth()->user()->photo_profil) }}" />
                                <span class="username username-hide-on-mobile"> {{ auth()->user()->nama }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="/agen/profil">
                                        <i class="icon-user"></i> Profile </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        <i class="icon-logout"></i> Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->
        
                    </ul>
                </div>
            </div>
            <!-- start horizontal menu -->
            <div class="navbar-custom">
                <div class="hor-menu hidden-sm hidden-xs">
                    <ul class="nav navbar-nav">
                        {{--  --}}
                    </ul>
                </div>
            </div>
            <!-- end horizontal menu -->
        </div>
        <!-- end header -->