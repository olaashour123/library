<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
       protected $table= 'cart';

    use HasFactory;

       protected $fillable = [
        'quantity',
        'customer_id',
        'book_id',
    ];

    protected $appends = [
        'total'
    ];

    public function getTotalAttribute()
    {

        return $this->quantity * $this->book->price;

    }


     public function book()
    {
        return $this->belongsTo(Book::class );

    }

     public function customers()
    {
        return $this->belongsTo(Customer::class );

    }



}
