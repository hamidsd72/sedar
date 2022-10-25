<!DOCTYPE HTML>
<html lang="en" dir="rtl">

@include('includes.head')

<style>
    body , .footer-bar-1, .header-fixed {
        max-width: 540px;
        margin: auto;
    }
</style>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">

@include('includes.preLoader')

<div id="page" >

    @include('includes.header')

    @include('includes.bottomNavigationBar')

    <div class="page-content header-clear-medium">
        @yield('content')
    </div>
</div>
    @include('includes.js')
</body>
  