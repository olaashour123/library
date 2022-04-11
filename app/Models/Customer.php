<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

      protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'image',
        'phone',
        'city',
        'postcode',
        'country _id',
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

     public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function wishlist()
    {
        return $this->belongsToMany(Book::class,'wish_lists')->withTimestamps();
    }


    
    public function wishlistHas($book_id)
    {
        return self::wishlist()->where('book_id',$book_id)->exists();
    }


}

