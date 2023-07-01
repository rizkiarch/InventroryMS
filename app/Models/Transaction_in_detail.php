<?php

namespace App\Models;

use App\Models\Transaction_in;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_in_detail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction_in()
    {
        return $this->belongsTo(Transaction_in::class);
    }
}
