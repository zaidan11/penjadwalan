<?php

namespace App\Http\Controllers;

use App\Models\coass_olah;
use App\Models\coass_olah_2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $users = coass_olah::where('nim', auth()->user()->nim)->paginate(10);
        return view('dashboard.mahasiswa.jadwal1', [
            'users' => $users
        ]);
    }
    public function index2()
    {
        $users = coass_olah_2::where('nim', auth()->user()->nim)->paginate(10);
        return view('dashboard.mahasiswa.jadwal2', [
            'users' => $users
        ]);
    }
}
