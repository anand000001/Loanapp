{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-switchable-team :team="$team" component="responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav> --}}

{{-- <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo.png" alt="Logo">
            <span>Mega able</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="search-container">
            <a class="nav-link search-icon" onclick="toggleSearch()" href="javascript:void(0);">
                <i class="fas fa-search"></i>
            </a>
            <form class="form-inline">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="navbarSearch">
            </form>
            <a class="nav-link" href="#" onclick="toggleFullScreen()">
                <i class="fas fa-expand"></i>
            </a>
        </div>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="" id="colorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v icon-white" ></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; width: auto; min-width: 250px;">
                        <div class="dropdown-item theme-switch">
                            <strong>Theme Switch</strong>
                            <div class="btn-group-toggle btn-group--colors" data-toggle="buttons" style="display: flex; flex-wrap: wrap; margin: 5px 0;">
                                <label class="btn" style="background-color: #32c787;" title="Green">
                                    <input type="radio" name="themeColor" value="#32c787" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #2196F3;" title="Blue">
                                    <input type="radio" name="themeColor" value="#2196F3" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #ff6b68;" title="Red">
                                    <input type="radio" name="themeColor" value="#ff6b68" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #FF9800;" title="Orange">
                                    <input type="radio" name="themeColor" value="#FF9800" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #39bbb0;" title="Teal">
                                    <input type="radio" name="themeColor" value="#39bbb0" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                
                                <div class="clearfix mt-2"></div>
                
                                <label class="btn" style="background-color: #00BCD4;" title="Cyan">
                                    <input type="radio" name="themeColor" value="#00BCD4" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #607D8B;" title="Blue Grey">
                                    <input type="radio" name="themeColor" value="#607D8B" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #d066e2;" title="Purple">
                                    <input type="radio" name="themeColor" value="#d066e2" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #3F51B5;" title="Indigo">
                                    <input type="radio" name="themeColor" value="#3F51B5" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #795548;" title="Brown">
                                    <input type="radio" name="themeColor" value="#795548" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item" onclick="toggleFullScreen()">Fullscreen</a>
                        <a href="#" class="dropdown-item">Clear Local Storage</a>
                    </div>

                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link notification-icon" href="#" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationsDropdown">
                        <a class="dropdown-item" href="#">Notification 1</a>
                        <a class="dropdown-item" href="#">Notification 2</a>
                        <a class="dropdown-item" href="#">Notification 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/avatar-4.jpg" alt="User" class="profile-img">
                        <span class="ml-2">John Doe</span>
                        <i class="fas fa-chevron-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}


<nav class="navbar navbar-custom border-bottom border-body fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-mark class="block h-9 w-auto" />
            </a>
        </div>
        {{-- <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="" id="colorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v icon-white" ></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; width: auto; min-width: 250px;">
                        <div class="dropdown-item theme-switch">
                            <strong>Theme Switch</strong>
                            <div class="btn-group-toggle btn-group--colors" data-toggle="buttons" style="display: flex; flex-wrap: wrap; margin: 5px 0;">
                                <label class="btn" style="background-color: #32c787;" title="Green">
                                    <input type="radio" name="themeColor" value="#32c787" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #2196F3;" title="Blue">
                                    <input type="radio" name="themeColor" value="#2196F3" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #ff6b68;" title="Red">
                                    <input type="radio" name="themeColor" value="#ff6b68" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #FF9800;" title="Orange">
                                    <input type="radio" name="themeColor" value="#FF9800" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #39bbb0;" title="Teal">
                                    <input type="radio" name="themeColor" value="#39bbb0" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                
                                <div class="clearfix mt-2"></div>
                
                                <label class="btn" style="background-color: #00BCD4;" title="Cyan">
                                    <input type="radio" name="themeColor" value="#00BCD4" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #607D8B;" title="Blue Grey">
                                    <input type="radio" name="themeColor" value="#607D8B" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #d066e2;" title="Purple">
                                    <input type="radio" name="themeColor" value="#d066e2" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #3F51B5;" title="Indigo">
                                    <input type="radio" name="themeColor" value="#3F51B5" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                                <label class="btn" style="background-color: #795548;" title="Brown">
                                    <input type="radio" name="themeColor" value="#795548" autocomplete="off" onclick="changeThemeColor(this.value)">
                                </label>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item" onclick="toggleFullScreen()">Fullscreen</a>
                        <a href="#" class="dropdown-item">Clear Local Storage</a>
                    </div>

                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link notification-icon" href="#" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationsDropdown">
                        <a class="dropdown-item" href="#">Notification 1</a>
                        <a class="dropdown-item" href="#">Notification 2</a>
                        <a class="dropdown-item" href="#">Notification 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/avatar-4.jpg" alt="User" class="profile-img">
                        <span class="ml-2">John Doe</span>
                        <i class="fas fa-chevron-down ml-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div> --}}
        <div class="ml-3 relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif

                    <div class="border-t border-gray-200"></div>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-dropdown-link href="{{ route('logout') }}"
                                 @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
      </div>
</nav>





