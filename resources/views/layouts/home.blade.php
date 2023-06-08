@extends('layouts.main')

@section('container')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <body>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="main-content container-fluid my-10">
                {{-- <div class="page-title">
                
            </div> --}}
                <h4 class="text-center mb-3" style="max-width:fit-content;">Selamat Datang</h4>
                <section class="section" style="max-width:fit-content;">
                    <div id="dashboard-content" class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('image/analytics.png') }}" alt="Dashboard Admin" style="height: 300px"
                            class="img-fluid">

                        <a href="/login"><button class="btn btn-primary rounded-pill mt-4 ms-2">Login<i
                                    class="badge-circle badge-circle-light-secondary font-medium-1"
                                    data-feather="arrow-right"></i></button></a>
                    </div>
                </section>
            </div>

        </body>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Maaf',
                text: 'User dilarang mengakses',
            })
        </script>
    @endif
@endsection
