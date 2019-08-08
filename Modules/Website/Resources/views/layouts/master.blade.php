<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{getSetting('description')}}">
    <meta name="author" content="ahmed Ibrahim">
    <meta name="keyword" content="{{getSetting('keyWord')}}">
    <link rel="icon" href="{{ asset('admin/images/visa.png') }}" type="image/ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{getSetting()}} || @yield('title') </title>
    @include('website::partials.styles')
    @yield('header')
  </head>
  
  <body>
    <div class="start-page" role="main" id="app">
      <header class="header" id="header">
        @include('website::partials.nav')
        @yield('slider-content')
      </header>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->
      @include('website::partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('website::partials.scripts')
    @yield('footer') 
      <script>
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
        //Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        language: 'ar',
        rtl: true,
        startDate: 'toDay',
        format: 'yyyy-mm-dd'
      });
      
      $('.selectpicker').selectpicker();

      </script>
    @include('website::partials.toastr')
    @include('website::partials.errors')
  </body>
</html>

