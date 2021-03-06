<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/app.css') }}">

        <title>@yield('title','Provide Title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">



        <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/all.css') }}">



        <script src="{{ URL::asset('js/app.js')}}"></script>
        <script src="{{ URL::asset('js/utility.js')}}"></script>
        

        <link href="https://unpkg.com/tabulator-tables@4.2.7/dist/css/semantic-ui/tabulator_semantic-ui.min.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.2.7/dist/js/tabulator.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>



{{--         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
        @yield('head')


    </head>
    <body>

        <div class="nav-wrapper">

            <nav id="sidebar">
                
                 <button type="button" id="sidebarCollapse" class="btn btn-info toggle-btn" onclick="toggleSidebar()">
                    <i class="fas fa-angle-left" id="arrow"></i>
                 </button>
                <div class="sidebar-header">
                    <picture>
                        <source media="(max-width:991px)" srcset="{{ url("/img/slogo.png")}}">
                        <img src="{{ url("/img/logo.png")}}">
                    </picture>
                </div>  

                <ul class="list-unstyled components">
                    <li class="username"><i class="fas fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->username}}</li> 

                    <li><a class="nav-btn" href="{{ url('Admin/OrderManager' )}}"><i class="fas fa-receipt"></i>&nbsp;&nbsp;Order</a></li>

                    @role('Admin|Store Manager|Product Manager')
                    <li><a class="nav-btn" href="{{ url('Admin/ProductManager') }}"><i class="fas fa-boxes"></i>&nbsp;&nbsp;Product</a></li> @endrole

                    @role('Admin|Store Manager')
                    <li><a  class="nav-btn" href="{{ url('Admin/Account') }}"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;Account</a></li>    
                    @endrole    
                    <li><a class="logout-btn" href="{{ url('Account/Logout')}}">&nbsp;&nbsp;Logout</a></li>
                </ul>

            </nav>

            <div id="main">
                @yield('body')

            </div>
        </div>
        @include('Shared/Loader')
       @yield('script')
    </body>
</html>
