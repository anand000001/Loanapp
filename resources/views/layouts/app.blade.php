

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
       
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/navigation-menu.css'])
        @vite(['resources/css/sidebar.css'])
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/css/style.css'])
        

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            
            <div class="flex flex-1">
                <!-- Sidemenu -->
                <aside class="aside text-white sticky top-0 h-screen">
                    @livewire('sidebar')
                </aside>
    
                <!-- Main Content Area -->
                <div class="flex-1 flex flex-col pt-5">
                    <!-- Page Heading -->
                    @hasSection('header')
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            @yield('header')
                        </div>
                    </header>
                    @endif
    
                    <!-- Page Content -->
                    {{-- <main class="flex-1">
                        @yield('content') 
                    </main> --}}
                    <main class="flex-1 p-4">
                        @yield('content') 
                    </main>
                    {{-- <main class="overflow-y-auto">
                        {{ $slot }}
                    </main> --}}
                </div>
            </div>
            

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main> --}}
        </div>

        @stack('modals')

        @livewireScripts

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSearch() {
        var searchInput = document.getElementById('navbarSearch');
        if (searchInput.classList.contains('active')) {
            searchInput.classList.remove('active');
            searchInput.value = '';
        } else {
            searchInput.classList.add('active');
            searchInput.focus();
        }
    }

    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    }

    function changeThemeColor(color) {
        // Change the navbar color based on the selected radio button value
        document.querySelector('.navbar').style.backgroundColor = color;
    }
</script>
    </body>
</html>
