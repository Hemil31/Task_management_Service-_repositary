@include('../layouts/header')
<section style="height: 70vh;">
    @yield('content')
    @stack('scripts')

</section>
@include('../layouts/footer')
