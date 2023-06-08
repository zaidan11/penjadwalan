@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-center"> Jadwal Tahap 1 {{ auth()->user()->nama }}</h1>
    </div>

    <main>
        <div class="card">
            <div class="card-body">
                <h4>Data Mahasiswa</h2>
                    <hr>
                    <h6>Nama : {{ auth()->user()->nama }}</h6>
                    <h6>NIM : {{ auth()->user()->nim }}</h6>
            </div>
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
                                            <th>NAMA STASE</th>
                                            <th>TANGGAL MULAI</th>
                                            <th>TANGGAL AKHIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->IdStase->nama }}</td>
                                                <td>{{ $user->tanggal_mulai }}</td>
                                                <td>{{ $user->tanggal_akhir }}</td>
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
        {{ $users->links() }}
    </div>
@endsection
