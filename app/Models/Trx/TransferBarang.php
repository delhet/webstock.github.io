<?php

namespace App\Models\Trx;

use App\Models\Master\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferBarang extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function details()
    {
        return $this->hasMany(TransferBarangDetail::class);
    }

}
