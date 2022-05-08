<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'quantity',
        'publisher_id'

    ];





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

     public function cart()
    {
        return $this->hasMany(Cart::class );
    }



    public function wishlist(){
        return $this->belongsToMany(Customer::class, 'wish_lists')->withTimestamps();
    }

    public function getInWishlistAttribute(){
        $customer = auth('customer')->user();

        if($customer){
            if($customer->wishlist()->where('book_id',$this->id)->first()){
                return true;
            }else{
                return false;
            }
        }
    }

}

