<?php

namespace App\Http\Controllers;

use App\Models\coass_mhs;
use App\Models\coass_mhs2;
use App\Models\coass_olah;
use App\Models\coass_olah_2;
use App\Imports\MahasiswaImport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\Storecoass_mhsRequest;
use App\Http\Requests\Updatecoass_mhsRequest;
use App\Imports\MahasiswaImport2;
use Illuminate\Database\Eloquent\Model;
use App\tahap1;
use App\tahap2;
use Egulias\EmailValidator\Exception\UnclosedComment;

class CoassMhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = coass_mhs::paginate(10);
        return view('dashboard.olahmhs.index', [
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storecoass_mhsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecoass_mhsRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'id' => 'required'
        ]);

        coass_mhs::create($validatedData);

        return redirect('/dashboard/admin/index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coass_mhs  $coass_mhs
     * @return \Illuminate\Http\Response
     */
    public function show(coass_mhs $coass_mhs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coass_mhs  $coass_mhs
     * @return \Illuminate\Http\Response
     */
    public function edit(coass_mhs $coass_mhs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecoass_mhsRequest  $request
     * @param  \App\Models\coass_mhs  $coass_mhs
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecoass_mhsRequest $request, coass_mhs $coass_mhs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coass_mhs  $coass_mhs
     * @return \Illuminate\Http\Response
     */
    public function destroy(coass_mhs $coass_mhs)
    {
        //
    }

    //tahap1
    public function mahasiswaimport(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new MahasiswaImport, $file);
        return redirect('/dashboard/olahmhs')->with('success', 'Data Berhasil Diupload');
    }

    public function generate(Request $request)
    {
        $zaidan1 = new tahap1;
        $zaidan1->tahap1();
        $zaidan1->updateTable();
        $zaidan1->builduptahap1();
        $zaidan1->updateCoassOlah();

        return redirect('/dashboard/olahmhs/lihatjadwal1')->with('success', 'Generate Tahap 1 Berhasil!');
    }

    public function hapustabel(Request $request)
    {
        $zaidan1 = new tahap1;
        $zaidan1->deleteTable();

        return redirect('/dashboard/olahmhs')->with('success', 'Jadwal Tahap 1 Berhasil Dihapus!');
    }

    public function lihatjadwal1()
    {
        $jadwal1 = coass_olah::paginate(10);
        return view('dashboard.olahmhs.jadwal1', [
            'jadwal1' => $jadwal1
        ]);
    }
    //tahap1

    //tahap2

    public function index2()
    {
        $mahasiswa2 = coass_mhs2::paginate(10);
        return  view('dashboard.olahmhs2.index', [
            'mahasiswa2' => $mahasiswa2
        ]);
    }

    public function mahasiswaimport2(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new MahasiswaImport2, $file);
        return redirect('/dashboard/olahmhs2')->with('success', 'Upload Data Berhasil!');
    }

    public function generate2()
    {
        $jadwal2 = new tahap2;
        // dd($jadwal2);
        $jadwal2->tahap2();
        $jadwal2->updateTable2();
        $jadwal2->builduptahap2();
        $jadwal2->updateCoassOlah2();

        return redirect('/dashboard/olahmhs2/lihatjadwal2')->with('success', 'Generate Tahap 2 Berhasil!');
    }

    public function hapustabel2()
    {
        $jadwal2 = new tahap2;
        $jadwal2->deleteTable2();

        return redirect('/dashboard/olahmhs2')->with('success', 'Jadwal Tahap 2 Berhasil Dihapus!');
    }

    public function lihatjadwal2()
    {
        $jadwal2 = coass_olah_2::paginate(10);
        return view('dashboard.olahmhs2.jadwal2', [
            'jadwal2' => $jadwal2
        ]);
    }
}
