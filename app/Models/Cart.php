<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{      protected $table= 'cart';
    use HasFactory;



     public function books()
    {
        return $this->belongsTo(Book::class );

    }


     public function customers()
    {
        return $this->belongsTo(Customer::class );

    }

}
