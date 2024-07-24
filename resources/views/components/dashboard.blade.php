<x-header></x-header>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- Navbar -->
        <x-navbar-dashboard></x-navbar-dashboard>
        
        <!-- Sidebar -->
        <x-sidebar></x-sidebar>
        

        <!-- Main Content -->
        <main class="md:ml-64 h-auto pt-20">
            {{ $slot }}
        </main>
    </div>
<x-footer></x-footer>