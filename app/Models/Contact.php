<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'message'
    ];


    public function scopesearchContact($query,$data){
        $query->when($data,function($query,$search ){
            $query->orWhere('name','like','%'.$search.'%')
                  ->orWhere('email','like','%'.$search.'%');
        });
    }
}
