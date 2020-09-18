<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unitorderline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'unit_orderline_id';
    
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
    
    public function product(){
        return $this->hasOne(Product::class,'product_id','product_id');
    }
    public function variant(){
        return $this->hasOne(Productvarient::class,'varient_id','variant_id');
    }
    public function unitorder(){
        return $this->hasOne(Unitorder::class,'order_id','order_id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
