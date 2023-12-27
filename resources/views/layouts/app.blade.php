@include('components.navbar')
@include('components.footer')

@yield('navbar')

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <div class="min-h-screen bg-gray-100">
           

            <!-- Page Heading -->

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

@yield('footer')
