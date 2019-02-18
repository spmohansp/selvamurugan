<nav class="navbar navbar-expand-lg bb-1 navbar-light bg-white fixed-top" id="mainNav">

    <!-- Start Header -->
    <header class="header-logo bg-white bb-1 br-1">
        <a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
        <a class="gredient-cl navbar-brand" href="{{url('/admin/home')}}">Selva Murugan Sizing</a>
    </header>
    <!-- End Header -->

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="ti-align-left"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- =============== Start Side Menu ============== -->
        <div class="navbar-side">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                <li class="nav-item @yield('dashboard')" data-toggle="tooltip" data-placement="right" title="Projects">
                    <a class="nav-link" href="{{ url('/admin/home') }}">
                        <i class="ti i-cl-2 ti-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>

                <!-- Master-->
                <li class="nav-item @yield('Master')" data-toggle="tooltip" data-placement="right" title="Master">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Master" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Master</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Master">
                        <li>
                            <a href="{{ url('/admin/units') }}">Units</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Customers') }}">Customer</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/subCustomers') }}">Sub Customer</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/companies') }}">Companies</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/chemicalsProduct') }}">Chemicals</a>
                        </li>
                    </ul>
                </li>
                <!--Master-->

                <li class="nav-item @yield('IncommingProducts')" data-toggle="tooltip" data-placement="right" title="Master">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#AddProductsIncome" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Incoming Products</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="AddProductsIncome">
                        <li>
                            <a href="{{ url('/admin/Product/beam') }}">Beam</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Product/yarn') }}">Yarn</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/Chemicals') }}">Chemical</a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('Warping')" data-toggle="tooltip" data-placement="right" title="Master">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#WARPING" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Warping</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="WARPING">
                        <li>
                            <a href="{{ url('/admin/warping') }}">warping</a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item @yield('Sizing')" data-toggle="tooltip" data-placement="right" title="Master">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#SIZING" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Sizing</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="SIZING">
                        <li>
                            <a href="{{ url('/admin/Sizing') }}">Sizing</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('Delevery')" data-toggle="tooltip" data-placement="right" title="Master">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Delevery" data-parent="#exampleAccordion">
                        <i class="ti i-cl-12 ti-settings"></i>
                        <span class="nav-link-text">Delevery</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="Delevery">
                        <li>
                            <a href="{{ url('/admin/delevery/fullBeam') }}">Full Beam Delevery</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/delevery/yarns') }}">Yarn Delevery</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/delevery/emptyBeams') }}">Empty Beam Delevery</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @yield('approval')" data-toggle="tooltip" data-placement="right" title="Projects">
                    <a class="nav-link" href="">
                        <i class="ti i-cl-2 ti-dashboard"></i>
                        <span class="nav-link-text">Report</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- =============== End Side Menu ============== -->

        <!-- =============== Header Rightside Menu ============== -->
        @include('admin.layout.user_nav')
        <!-- =============== End Header Rightside Menu ============== -->
    </div>
</nav>  
