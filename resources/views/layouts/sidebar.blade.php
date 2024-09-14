@section('sidebar')
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ Vite::asset('resources/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ Vite::asset('resources/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ Vite::asset('resources/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ Vite::asset('resources/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('cashflow.create') }}">
                        <i class="ri-edit-2-line"></i> <span data-key="t-widgets">Cashflow</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('cashflow.index') }}">
                        <i class="ri-file-list-line"></i> <span data-key="t-widgets">Cashflow Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('customer.create') }}">
                        <i class=" ri-settings-4-line"></i> <span data-key="t-widgets">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('product.create') }}">
                        <i class=" ri-settings-4-line"></i> <span data-key="t-widgets">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('currency.create') }}">
                        <i class="ri-money-dollar-circle-line"></i> <span data-key="t-widgets">Currency</span>
                    </a>
                </li> 
                 <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('company.create') }}">
                        <i class="ri-building-2-line"></i> <span data-key="t-widgets">Company</span>
                    </a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('conversion.create') }}">
                        <i class=" ri-settings-4-line"></i> <span data-key="t-widgets">Conversion Factor</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>

@endsection