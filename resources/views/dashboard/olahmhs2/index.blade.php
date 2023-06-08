@extends('layouts.main')

@section('container')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center"> Data Mahasiswa Coass Tahap 2</h1>
    </div>
    <div class="mt-3 mb-3">
        <button type="button" class="btn btn-success rounded-pill">
            <a href="{{ route('generate2') }}" style="color:white
            ">Generate Jadwal</a>
        </button>
        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Import Data Mahasiswa
        </button>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('importmahasiswa2') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <main>
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
                                            <th>ID</th>
                                            <th>NIM</th>
                                            <th>NAMA MAHASISWA</th>
                                            <th>JENIS KELAMIN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa2 as $mhs)
                                            <tr>
                                                <td>{{ $mhs->id }}</td>
                                                <td>{{ $mhs->nim }}</td>
                                                <td>{{ $mhs->nama_mhs }}</td>
                                                <td>{{ $mhs->lp }}</td>
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

    <div class="d-flex justify-content-left">
        {{ $mahasiswa2->links() }}
    </div>
@endsection
