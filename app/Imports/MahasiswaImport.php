<?php

namespace App\Imports;

use App\Models\coass_mhs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new coass_mhs([
            'ID' => $row['id'],
            'NIM' => $row['nim'],
            'NAMA_MHS' => $row['nama_mhs'],
            'LP' => $row['lp'],
        ]);
    }
}
