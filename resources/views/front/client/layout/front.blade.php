<!DOCTYPE html>
<html lang="en">
@include('front.client.layout.partials.head')
<x-front-header-component />

@yield('content')
<x-front-footer-component />
@include('front.client.layout.partials.foot')

</html>