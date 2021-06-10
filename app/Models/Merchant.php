<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';
    protected $guarded = [];
    use HasFactory;

    public function alamat()
    {
        return $this->belongsTo(AlamatMerchant::class, 'id_alamat', 'id');
    }
}
