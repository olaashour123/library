<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


     public function books()
    {
        return $this->belongTo(Book::class );

    }


     public function customers()
    {
        return $this->hasMany(Customer::class );

    }

}
