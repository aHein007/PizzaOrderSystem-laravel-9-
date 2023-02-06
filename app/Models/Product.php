<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'waiting_time',
        'view_count'
    ];

    public function scopeproductSearch($query ,$data)
    {
        $query->when($data , function($query ,$search){
            $query->where('name','like','%'.$search.'%')
                  ->orwhere('price','like','%'.$search.'%');
        });
    }
}
