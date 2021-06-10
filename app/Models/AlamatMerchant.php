<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatMerchant extends Model
{
    protected $table = 'alamat_merchant';
    protected $guarded = [];
    use HasFactory;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'mc_id', 'id');
    }
}
