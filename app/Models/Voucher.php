<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';
    protected $guarded = [];
    use HasFactory;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'idrs', 'idrs');
    }
}
