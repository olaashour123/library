<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
 public $timestamps  = false ;
 public function cart()
    {
        return $this->hasMany(Cart::class );

    }


     public function books()
    {
        return $this->belongToMany(Book::class );

    }
}
