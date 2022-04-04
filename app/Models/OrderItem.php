<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderItem extends Model
{
    use HasFactory;
     public $timestamps  = false ;


    protected $fillable = [
        'order_id',
        'book_id',
        'price',
        'quantity'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
