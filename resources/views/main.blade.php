<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- include the head nav messages navbar footer javascript  partials in partials folder -->
    @include('partials._head')
</head>
<body>
@include('partials._nav')
<div class="container container-spacing">
    @include('partials._messages')
    @yield('content')
</div>
@include('partials._footer')
@include('partials._javascript')
@yield('scripts')
</body>
</html>
