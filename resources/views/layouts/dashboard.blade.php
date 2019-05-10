<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Coupons App</title>
</head>
<body>
    @yield('modal')
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Coupons App Administrator</h3>
            </div>
    
            <ul class="list-unstyled components">
                <p>Acciones</p>
                <li>
                    <a href="{{route('establishments')}}">Home</a>
                </li>
                <li>
                    <a href="#establishment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Establishments</a>
                    <ul class="collapse list-unstyled" id="establishment">
                        <li>
                            <a href="{{route('establishments')}}">View All</a>
                            <a href="{{route('createEstablishment')}}">Create</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('createProduct')}}">Create Product</a>
                </li>
            </ul>
        </nav>
    
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                        <div class="d-flex justify-content-center">
                            <button type="button" id="sidebarCollapse" class="btn btn-info mb-4">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-11 d-flex justify-content-center">
                        @yield('title')
                    </div>
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
         $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    </script>
    @yield('scripts')
</body>
</html>