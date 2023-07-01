<?php

namespace App\Models;

use App\Models\Transaction_out_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_out extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction_out_details()
    {
        return $this->hasMany(Transaction_out_detail::class);
    }
}
