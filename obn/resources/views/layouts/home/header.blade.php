<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<link rel="shortcut icon" href="{{asset('dist/images/logo2.png')}}">
    <!-- Title -->
    <title>@yield('title')</title>


    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

</head>

<body class="light-version">

    <!-- ##### Header Area Start ##### -->
    <nav class="navbar navbar-expand-lg navbar-white fixed-top" id="banner">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/"><span><img src="{{asset('/dist/images/logo1.png')}}" alt="logo"></span> TFCBANK</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Signup</a>
                    </li>

                    <li class="lh-55px"><a href="{{ route('user.login') }}" class="btn login-btn ml-50">Login!</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- ##### Header Area End ##### -->
    @yield('content')
 