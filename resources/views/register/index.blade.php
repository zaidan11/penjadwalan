@extends('layouts.main')
@section('container')
    <div class="container mt-4">
        <main>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-center"> Data User</h1>
            </div>
            <div class="mb-3">
                <a href="/dashboard/datauser/create" class="btn btn-primary rounded-pill">Tambah User Baru</a>
            </div>
            <section class="section">
                <div class="row" id="table-striped">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <!-- table striped -->
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>NAMA</th>
                                                <th>NIM</th>
                                                <th>EMAIL</th>
                                                <th>ROLE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->nama }}</td>
                                                    <td>{{ $user->nim }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
@endsection
