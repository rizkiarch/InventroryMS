<?php

namespace App\Models;

use App\Models\Transaction_in;
use App\Models\Transaction_out;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    function Transaction_in()
    {
        return $this->hasMany(Transaction_in::class);
    }

    function Transaction_out()
    {
        return $this->hasMany(Transaction_out::class);
    }
}
