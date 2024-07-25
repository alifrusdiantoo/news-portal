<x-header></x-header>
    <!-- Navbar -->
    <x-navbar-dashboard></x-navbar-dashboard>
    
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>
    

    <!-- Main Content -->
    <main class="md:ml-64 h-auto pt-20 antialiased bg-gray-50 dark:bg-gray-900">
        {{ $slot }}
    </main>
<x-footer></x-footer>