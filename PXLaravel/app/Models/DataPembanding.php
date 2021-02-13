<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembanding extends Model
{
    use HasFactory;
    protected $fillable = ['waktu','xt','ft','selisih','mae','mse','mape','konstanta_id','sensor_id'];
}
