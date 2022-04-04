<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

//     protected $column='address_id';
 //protected $primaryKey ='address_id';
 public $timestamps  = false ;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address',
        'country',
        'phone',
        'postcode',
        'city'

    ];
}
