<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

    ];
    public function books(){
        return $this->morphMany(Book::class, 'bookable');
    }
}
