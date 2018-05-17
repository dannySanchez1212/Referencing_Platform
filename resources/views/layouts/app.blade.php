<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Referencing Platform') }}</title>

   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <style>
        div.dataTables_wrapper 
            {
            width: 100%;
            }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles 
    
<script src="{{ asset('js/app.js') }}"></script> -->
 <!-- Scripts -->
   
   <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Referencing Platform') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else

                                @if(Auth::user()->name)

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Postmark <span class="caret"></span>
                                    </a>                                    
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                     href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('Twilio')<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('Twilio.Sms') }}">Send Sms</a>

                                    </ul>                                   
                                    
                            </li>
                            <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        @lang('Docmail')<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <a href="{{ route('user.docmail') }}">Send Docmail</a>
                                    </ul>
                                    
                            </li>
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Creditionformer <span class="caret"></span>
                                    </a>
                                    
                            </li>
                                   @if(Auth::user()->name=='Admin')

                                    <li class="nav-item dropdown">
                                    <a  class="nav-link dropdown-toggle" href=" {{ route('user.indexA') }} " role="button" aria-expanded="false" v-pre>
                                        User <span class="caret"></span>
                                    </a>
                                    
                            `       </li>
                                   @endif

                            @endif



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>



                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('edit',Auth::user()->id) }}">
                                        {{ __('Edit') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script> 
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
         @yield('scripts')
</body>
</html>
