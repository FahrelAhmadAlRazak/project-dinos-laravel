@include('layoutsDashboard.headerDashboard')
@if(session('success'))
<p class="alert alert-success"> {{ session('success') }}</p>
@endif
@include('layoutsDashboard.sideDashboard')

<!-- @yield('styles') -->
@yield('content')
<!-- @yield('scripts') -->

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>