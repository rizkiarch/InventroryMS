<?php

namespace App\Models;

use App\Models\Transaction_out;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_out_detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction_out()
    {
        return $this->belongsTo(Transaction_out::class);
    }
}
