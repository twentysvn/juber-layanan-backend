<?php

namespace App\Models;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NPWP extends Model
{
    protected $table = 'npwp';
    protected $guarded = [];
    use HasFactory;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'mc_id', 'id');
    }
}
