<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

      protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'image',
    ];

//  public $timestamps  = false ;
 public function cart()
    {
        return $this->hasMany(Cart::class );
    }


     public function books()
    {
        return $this->belongsToMany(Book::class );
    }
}
