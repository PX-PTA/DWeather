<?php

namespace App\Imports;

use App\Models\DataPembanding;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataPembandingImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPembanding([
            'waktu' => $row["tahun"]."-".$row["bulan"]."-01 00:00:00",
            'xt' => $row["xt"],
            'ft' => $row['ft'],
            'selisih' => $row["selisih"],
            'mae' => $row["mae"],
            'mse' => $row["mse"],
            'mape' => $row["mape"],
            'konstanta_id' => $row["konstanta"],
            'sensor_id' => $row["sensor"],
        ]);
    }
}
