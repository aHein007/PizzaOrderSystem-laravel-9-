<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'name'
    ];

    public function scopesearch($query ,$data)
    {
        $query->when($data,function($query ,$search){
            $query->where('name','like','%'.$search.'%');
        });
    }
}
