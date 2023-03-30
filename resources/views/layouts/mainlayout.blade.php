<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>


    <style>
        .main {
            height: 100vh;
        }

        /* .body-content {
            background: #000;
            color: #fff;


        } */


        .sidebar {
            background: rgb(97, 97, 97);
            color: #fff;


        }

        /* .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            padding: 10px;
        } */

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 20px 10px;

        }

        .sidebar a:hover {
            background: black;
        }
    </style>
    <div class="main  d-flex flex-column justify-content-lg-between ">


        <nav class="navbar sticky-top bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/icon.ico') }}" alt="Logo" width="30" height="30"
                        class="d-inline-block align-text-top">
                    Library
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTarget"
                    aria-controls="navbarTarget" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>


        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar  col-lg-3 collapse d-lg-block" id="navbarTarget">


                    @if (Auth::user()->role_id == 1)
                        <a href="dashboard">Dashboard</a>


                        <a href="books">Books</a>



                        <a href="categories">Categories</a>


                        <a href="users">Users</a>


                        <a href="rent">Rent</a>


                        <a href="profile">Profile</a>


                        <a href="logout">Logout</a>
                    @else
                        <a href="profile">Profile</a>


                        <a href="logout">Logout</a>
                    @endif

                </div>
                <div class="content p-5 col-lg-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    {{-- <div>
        @yield('content')
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
