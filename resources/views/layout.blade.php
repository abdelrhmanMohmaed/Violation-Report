<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('uploads/img/samaya-logo.jpg') }}" type="image/x-icon">
    {{-- BootStarp --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{ asset('uploads/css/bootstrap.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('uploads/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('uploads/css/main.css') }}">
    <title>Violation Report - @yield('title')</title>

    @yield('style')

</head>

<body>
    {{-- start form hidden to can logOut in any page --}}
    <form id="logout-form" action="{{ url('/logout') }}" method="post" style="display: none;">
        @csrf
    </form>
    {{-- End form hidden to can logOut in any page --}}
    {{-- start share component navbar and img --}}
    <div class="d-flex justify-content-start mx-1">
        <div class="col-md-2 justify-content-center align-items-center">
            <img class="img-fluid bg-dark" src="{{ asset('uploads/img/samaya-logo1.jpg') }}" alt="" srcset=""
                style="height: 55px">
        </div>

        <ul class="nav ms-auto py-2">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @if (Auth::user()->role->name == 'superAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('reports-list/change-password') }}">Change password</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/reports-list') }}">Reports List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('reports-list/over-report') }}">Over Due List</a>
                </li>
                <li class="nav-item">
                    <a id="logout-link" class="nav-link" href="#">LogOut&nbsp;<i class="fas fa-sign-out-alt"></i></a>
                </li>
            @endauth
        </ul>
    </div>
    {{-- End share component navbar and img --}}




    @yield('main')


    <script src="{{ asset('uploads/js/all.min.js') }}"></script>

    {{-- bootstrap --}}
    <script src="{{ asset('uploads/js/bootstrap.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('uploads/js/jq.js') }}"></script>
    @yield('script')
    <script>
        //start fun to can logOut in any page 
        $('#logout-link').click(function(e) {
            e.preventDefault();
            $('#logout-form').submit();
        });
        //End fun to can log Out in any page 
    </script>
</body>


</html>
