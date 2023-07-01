<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Transaction_in_detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction_in extends Model
{
    use HasFactory;
    protected $guarded = [];

    function product()
    {
        return $this->belongsTo(Product::class);
    }
}
