@extends('layouts.main')
@section('container')
    <div class="container mt-4">

        <h1 class="h3 mb-3 fw-normal text-center">Edit Data User</h1>
        <hr>
        <div class="mb-3">
            <a href="/dashboard/datauser/lihatdata" class="btn btn-primary rounded-pill">Lihat Data User Lama</a>
        </div>

        <div class="row">
            <div class="col-lg-5">

                <main class="form-registration w-100 m-auto">
                    <form action="/dashboard/datauser/register" method="post">
                        @csrf

                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Nama" name="nama" required value="{{ old('nama') }}">
                            <label for="nama">Nama</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top @error('nim') is-invalid @enderror"
                                id="nim" placeholder="NIM" name="nim" required value="{{ old('nim') }}">
                            <label for="nim">NIM</label>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <select class="form-select" name="role" id="role" placeholder="Pilih Role">
                                @foreach ($users as $user)
                                    <option value={{ $user->role }}>{{ $user->role }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email" name="email" required value="{{ old('email') }}">
                            <label for="name">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password"
                                class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                                placeholder="Password" name="password" required value="{{ old('password') }}">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Tambah Data</button>
                    </form>
                </main>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    </body>

    </html>
@endsection
