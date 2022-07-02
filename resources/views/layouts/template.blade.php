<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('head')

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>
<body>
    <div id="template" class="container">
        <div id="header" class="container-fluid">
            <a href="{{ route('home') }}"><div class="app-name df-text">{{ config('app.name') }}</div></a>
            <div>
            @guest
                @if (Route::has('login'))
                    <a class="df-text" href="{{ route('login') }}">Faça login</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-primary df-btn">Registrar</button></a>
                @endif
                
                @else
                <div style="display: flex;">
                    <div class="df-text">{{ Auth::user()->name }}</div>
                    <div class="dropdown">
                        <button onclick="displayItems()" class="nav-ham">
                            <svg class="nav-ham" viewBox="0 0 100 80" width="30" height="30">
                                <rect class="nav-ham" width="80" height="8"></rect>
                                <rect class="nav-ham" y="30" width="80" height="8"></rect>
                                <rect class="nav-ham" y="60" width="80" height="8"></rect>
                            </svg>
                        </button>
                        <div id="items" class="dropdown-content">
                            <a class="dropdown-item" href="{{ route('music') }}">Espaço musical</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endguest
            </div>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
    <div id="footer">
        <a href="https://github.com/pedro-fernandes-11" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 24 24" style=" fill:#ffffff;">
                <path d="M10.9,2.1c-4.6,0.5-8.3,4.2-8.8,8.7c-0.5,4.7,2.2,8.9,6.3,10.5C8.7,21.4,9,21.2,9,20.8v-1.6c0,0-0.4,0.1-0.9,0.1 c-1.4,0-2-1.2-2.1-1.9c-0.1-0.4-0.3-0.7-0.6-1C5.1,16.3,5,16.3,5,16.2C5,16,5.3,16,5.4,16c0.6,0,1.1,0.7,1.3,1c0.5,0.8,1.1,1,1.4,1 c0.4,0,0.7-0.1,0.9-0.2c0.1-0.7,0.4-1.4,1-1.8c-2.3-0.5-4-1.8-4-4c0-1.1,0.5-2.2,1.2-3C7.1,8.8,7,8.3,7,7.6C7,7.2,7,6.6,7.3,6 c0,0,1.4,0,2.8,1.3C10.6,7.1,11.3,7,12,7s1.4,0.1,2,0.3C15.3,6,16.8,6,16.8,6C17,6.6,17,7.2,17,7.6c0,0.8-0.1,1.2-0.2,1.4 c0.7,0.8,1.2,1.8,1.2,3c0,2.2-1.7,3.5-4,4c0.6,0.5,1,1.4,1,2.3v2.6c0,0.3,0.3,0.6,0.7,0.5c3.7-1.5,6.3-5.1,6.3-9.3 C22,6.1,16.9,1.4,10.9,2.1z"></path>
            </svg>
        </a>
    </div>
    <script>
        function displayItems() {
            console.log("a");
            document.getElementById("items").classList.toggle("show");
        }
        
        window.onclick = function(event) {
            console.log(event.target);
            if (!event.target.matches('.nav-ham')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;

                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>    
</body>
</html>
