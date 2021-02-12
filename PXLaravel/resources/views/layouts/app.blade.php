<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/dashboard.js') }}" defer></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed font-sans antialiased text-sm">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <x-jet-dropdown id="teamManagementDropdown">
                            <x-slot name="trigger">{{ Auth::user()->currentTeam->name }}</x-slot>

                            <x-slot name="content">
                                <!-- Team Management -->
                                <h6 class="dropdown-header">
                                    {{ __('Manage Team') }}
                                </h6>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <hr class="dropdown-divider">

                                <!-- Team Switcher -->
                                <h6 class="dropdown-header">
                                    {{ __('Switch Teams') }}
                                </h6>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                    @endif

                    <!-- Authentication Links -->
                    @auth
                        <x-jet-dropdown id="navbarDropdown" class="user-menu">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <img class="user-image img-circle elevation-1" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                @endif
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>

                                <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <h6 class="dropdown-header">
                                    {{ __('Manage Account') }}
                                </h6>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <hr class="dropdown-divider">

                                <!-- Authentication -->
                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-warning elevation-2">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <x-jet-application-mark width="36" class="brand-image img-circle elevation-1" style="opacity: .8" />
                    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    </div> -->

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                    Dashboard
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dataHasil.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                    Dashboard Data
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                    Setting Admin
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                    Alat
                                    <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('device.index') }}" class="nav-link">
                                            <i class="fas fa-network-wired nav-icon"></i>
                                            <p>Alat Deteksi</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sensor.suhu') }}" class="nav-link">
                                            <i class="fas fa-cloud-sun nav-icon"></i>
                                            <p>Sensor Suhu</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sensor.angin') }}" class="nav-link">
                                            <i class="fas fa-wind nav-icon"></i>
                                            <p>Sensor Angin</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sensor.kelembapan') }}" class="nav-link">
                                            <i class="far fa-sun nav-icon"></i>
                                            <p>Sensor Kelembapan</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                    Data
                                    <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('datum.kelembapan') }}" class="nav-link">
                                            <i class="fas fa-cloud-sun nav-icon"></i>
                                            <p>Kelembapan</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('datum.angin') }}" class="nav-link">
                                            <i class="fas fa-wind nav-icon"></i>
                                            <p>Angin</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('datum.suhu') }}" class="nav-link">
                                            <i class="far fa-sun nav-icon"></i>
                                            <p>Suhu</p>
                                            <span class="right badge badge-danger">New</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                    <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-1" alt="{{ Auth::user()->name }}">
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('profile.show') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                    Profile - {{ Auth::user()->name }}
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                    Logout
                                    <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <h1>{{ $header }}</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                {{ $slot }}
                            </div>

                            @if (isset($aside))
                                <div class="col-lg-3">
                                    {{ $aside }}
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b><a href="https://jetstream.laravel.com">Jetstream</a></b>
                </div>
                <strong>Powered by</strong> <a href="https://adminlte.io">AdminLTE</a>
            </footer>
        </div>

        @stack('modals')
        @livewireScripts
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        @stack('scripts')
    </body>
</html>
