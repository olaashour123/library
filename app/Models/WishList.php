<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
       protected $table= 'cart';

    use HasFactory;

       protected $fillable = [
        'customer_id',
        'book_id',
    ];

   
     public function book()
    {
        return $this->belongsTo(Book::class );

    }

     public function customer()
    {
        return $this->belongsTo(Customer::class );

    }



}
