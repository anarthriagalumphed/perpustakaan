<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>


    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .register-box {
            width: 500px;
            border: solid 1px;
            padding: 30px;
        }

        form div {
            margin: 15px;
        }

        body{
            background-color: #454d55;
        }

        .register-box {
            background-color: #343a40;
    color: #fff;
}

    </style>
    <div class="main d-flex flex-column  justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger "style="width: 500px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (session('status'))
            <div class="alert alert-success" style="width: 500px">
                <li>{{ session('message') }}</li>
            </div>
        @endif
        <div class="register-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                {{-- <div>
                    <label for="phone" class="form-label">phone</label>
                    <input type="number" name="phone" id="phone" class="form-control">
                </div> --}}
                {{-- <div>
                    <label for="address" class="form-label">address</label>
                    <textarea type="address" name="address" id="address" class="form-control" rows="3"></textarea>
                </div> --}}
                <div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    Already Have Account? <a href="login">Sign In</a>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>
