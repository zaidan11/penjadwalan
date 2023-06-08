@extends('layouts.home')
@section('container')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center"> Hasil Penjadwalan Tahap 2</h1>
    </div>

    <div class="mt-3 mb-3">
        <button type="button" class="btn btn-danger rounded-pill">
            <a href="{{ route('hapus2') }}" style="color: white">Hapus Jadwal</a>
        </button>
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
                                            <th>NIM</th>
                                            <th>NAMA MAHASISWA</th>
                                            <th>NAMA STASE</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL AKHIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal2 as $jdwl)
                                            <tr>
                                                <td>{{ $jdwl->nim }}</td>
                                                <td>{{ $jdwl->IdMhs2->nama_mhs }}</td>
                                                <td>{{ $jdwl->IdStase2->nama }}</td>
                                                <td>{{ $jdwl->tanggal_mulai }}</td>
                                                <td>{{ $jdwl->tanggal_akhir }}</td>
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

    <div>
        {{ $jadwal2->links() }}
    </div>
@endsection
