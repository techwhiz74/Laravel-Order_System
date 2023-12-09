<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    @include('includes.header')
    @auth
        @include('includes.sidebar')
        <div class="main-content-wrapper">
            @yield('content')
            @include('users.orders.embroidery_information')
            @include('users.orders.embroidery_price')
            @include('users.orders.vector_information')
            @include('users.orders.vector_price')
        </div>
    @else
        <div>
            @yield('content')
            @include('users.orders.embroidery_information')
            @include('users.orders.embroidery_price')
            @include('users.orders.vector_information')
            @include('users.orders.vector_price')
        </div>
    @endauth
    <div class="overlay"></div>
    @include('includes.footer')
</body>

</html>
