<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">Admin</span>
        </a>
        <!-- END Logo -->

        <x-theme />
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                @foreach ($navbar as $key => $nav)
                    <li class="nav-main-item">
                        @isset($nav['link'])
                            <a class="nav-main-link" href="{{ $nav['link'] }}">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">{{ $nav['name'] }}</span>
                            </a>
                            @continue
                        @endisset

                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                            aria-expanded="false" href="#">
                            <i class="nav-main-link-icon si si-energy"></i>
                            <span class="nav-main-link-name">{{ $nav['name'] }}</span>
                        </a>
                        <ul class="nav-main-submenu">
                            @foreach ($nav['children'] as $child)
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="{{ $child['link'] }}">
                                        <span class="nav-main-link-name">{{ $child['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
