<?php

namespace App\Models\Trx;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInDetail extends Model
{
    protected $guarded = [];
    public function barangData()
    {
        return $this->belongsTo(Barang::class);
    }
}
