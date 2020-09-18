<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productvarient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'varient_id';
    
    protected $fillable = [
        'product_id','colour','prize',  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
