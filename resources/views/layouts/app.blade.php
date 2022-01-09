<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="alert-container">
                <div class="container col-12">
                    <div class="row">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4 class="bolded alert-title"><i class="icon fa fa-ban"></i> Błąd</h4>
                                    <ul>
                                        @foreach ($errors->all() as  $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if ($message = Session::get('message'))
                                <div class="alert alert-{{ Session::get('message_type') ? Session::get('message_type') : 'danger' }} alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @if (Session::get('message_type') == 'success')
                                    <h4><i class="icon fa fa-check"></i> Sukces</h4>
                                    @elseif (Session::get('message_type') == 'warning')
                                    <h4><i class="icon fa fa-warning"></i> Ostrzeżenie</h4>
                                    @elseif (Session::get('message_type') == 'info')
                                    <h4><i class="icon fa fa-info"></i> Informacja</h4>
                                    @else
                                    <h4><i class="icon fa fa-ban"></i> Błąd</h4>
                                    @endif
                                    {{ $message }}
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
    </footer>
</div>

<script src="{{ mix('js/app.js') }}" defer></script>

@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
