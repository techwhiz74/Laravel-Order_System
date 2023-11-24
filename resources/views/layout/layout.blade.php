<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    @include('includes.header')
    @if (auth()->user())
        @include('includes.sidebar')
    @endif

    @if (auth()->user())
        @if (auth()->user()->user_type == 'customer')
            <div class="main-content-wrapper">
                @yield('content')
                @include('users.orders.embroidery_information')
                @include('users.orders.embroidery_price')
                @include('users.orders.vector_information')
                @include('users.orders.vector_price')
            </div>
        @elseif (auth()->user()->user_type == 'freelancer')
            <div class="main-content-wrapper" style="margin-top: 100px !important;">
                @yield('content')
                @include('users.orders.embroidery_information')
                @include('users.orders.embroidery_price')
                @include('users.orders.vector_information')
                @include('users.orders.vector_price')
            </div>
        @elseif(auth()->user()->user_type == 'admin')
            <div class="main-content-wrapper" style="margin-top: 100px !important;">
                @yield('content')
                @include('users.orders.embroidery_information')
                @include('users.orders.embroidery_price')
                @include('users.orders.vector_information')
                @include('users.orders.vector_price')
            </div>
        @endif
    @else
        <div class="main-content-wrapper">
            @yield('content')
            @include('users.orders.embroidery_information')
            @include('users.orders.embroidery_price')
            @include('users.orders.vector_information')
            @include('users.orders.vector_price')
        </div>
    @endif

    <div class="overlay"></div>
    @include('includes.footer')
</body>

</html>
