<?php

namespace App\Models;

use App\Models\Transaction_in_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_in extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaction_in_details()
    {
        return $this->hasMany(Transaction_in_detail::class);
    }
}
