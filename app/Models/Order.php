<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'order_code',
        'total_price',
        'status',
        'created_at',
        'updated_at'
    ];

    public function scopesearchOrder($query,$data){
        $query->when($data ,function($query ,$search){
            $query->orWhere('users.name','like',"%".$search."%")
                  ->orWhere('orders.total_price','like',"%".$search."%")
                  ->orWhere('orders.order_code','like','%'.$search.'%')
                  ->get();
        });
    }
}
