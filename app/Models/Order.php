<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\OrderAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
 //  public $timestamps  = false ;
 // protected $primaryKey ='address_id';
   //   protected $column='address_id';

    protected $fillable = [
      'customer_id',
      'status',
      'payment_status',
      'discount',
      'address_id'
    ];

    protected $appends = [
        'total'
    ];

    public function getTotalAttribute()
    {

        return $this->items->quantity * $this->items->price;

    }


    public function customer()
    {
        $this->belongsTo(Customer::class , 'customer_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(OrderAddress::class, 'address_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


}
