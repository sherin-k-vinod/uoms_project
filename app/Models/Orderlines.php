<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderlines extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'orderline_id';
    
    protected $fillable = [
         'order_id', 'product_id', 'variant_id', 'quantity', 'line_total'
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
