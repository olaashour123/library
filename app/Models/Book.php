<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps  = false ;

    public function categories()
    {
        return $this->belongsToMany(Category::class );
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class );
    }
     public function publisher()
    {
        return $this->belongsTo(Publisher::class );

    }

     public function customers()
    {
        return $this->belongsToMany(Customer::class );

    }

     public function carts()
    {
        return $this->hasMany(Cart::class );
    }
}

