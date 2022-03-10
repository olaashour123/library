<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Author extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'image',
        'description',
        'author_publisher'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class );
    }

     public function publishers()
    {
        return $this->belongsToMany(Publisher::class );
    }

     public function syncPublisher(array $publishers)
    {
        $publisher_id = [];
        foreach ($publishers as $publisher) {
            $publisher = Publisher::firstOrCreate([
                'slug' => Str::slug($publisher),
            ], [
                'name' => trim($publisher),
            ]);
            $publisher_id[] = $publisher->id;
        }
        $this->publishers()->sync($publisher_id);
    }


}
