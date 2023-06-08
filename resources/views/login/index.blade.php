<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    {{-- bootstraps icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <div class="container mt-4">

        <div class="row justify-content-center">
            <div class="col-md-4">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>

                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Email" name="email" required autofocus
                                value="{{ old('email') }}">
                            <label for="floatingInput">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="checkbox mb-3">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center">Belum terdaftar? <a href="/register">Daftar Sekarang!</a></small>
                </main>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
