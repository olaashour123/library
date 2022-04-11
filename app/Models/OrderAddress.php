<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $table= 'order_addresses';

//     protected $column='address_id';
 //protected $primaryKey ='address_id';
 public $timestamps  = false ;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'phone',
        'postcode',
        'city',
        'country_id',
    ];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

 }
