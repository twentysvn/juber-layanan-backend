<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon';
    protected $guarded = [];
    use HasFactory;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'idrs', 'idrs');
    }
}
