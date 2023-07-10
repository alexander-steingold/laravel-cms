<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box d-flex justify-content-center  align-items-center">
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" x="0px" y="0px" width="36"
                         height="36" viewBox="0,0,256,256"
                         style="fill:#000000;">
                        <g fill="#fa5252" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                           stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                           font-family="none" font-weight="none" font-size="none" text-anchor="none"
                           style="mix-blend-mode: normal">
                            <g transform="scale(10.66667,10.66667)">
                                <path
                                    d="M11.14,14.42l-1.14,1.94c-0.56,-2.03 -2.43,-3.52 -4.64,-3.52c-0.37,0 -0.74,0.04 -1.08,0.13l3.09,-5.24c0.11,0.37 0.26,0.74 0.46,1.09zM5.36,14.344c-1.838,0 -3.328,1.49 -3.328,3.328c0,1.838 1.49,3.328 3.328,3.328c1.838,0 3.328,-1.49 3.328,-3.328c0,-1.838 -1.49,-3.328 -3.328,-3.328zM15.79,19.336c0.919,1.592 2.994,2.122 4.546,1.218c1.589,-0.925 2.137,-2.954 1.218,-4.546l-6.656,-11.264c-0.919,-1.592 -2.988,-2.122 -4.546,-1.218c-1.59,0.922 -2.137,2.954 -1.218,4.546z"></path>
                            </g>
                        </g>
                    </svg>
                </a>

            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>


            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                         src="{{asset('backend/assets/images/users/'.Auth::user()->avatar)}}"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->username }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('profile.edit')}}"><i
                            class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My
                        Wallet</a>
                    <a class="dropdown-item d-block" href="#"><span
                            class="badge bg-success float-end mt-1">11</span><i
                            class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock
                        screen</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('admin.logout')}}">
                        <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
