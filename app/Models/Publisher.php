<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public $timestamps  = false ;
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'image',
    ];

    public function books()
    {
        return $this->hasMany(Book::class );

    }


     public function authors()
    {
        return $this->belongsToMany(Author::class );
    }


}
