<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoiceline extends Model
{
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'invoice_line_id';
    
    protected $fillable = [
    	'invoice_id', 'order_id', 'product_id',	'variant_id', 'quantity', 'line_total'
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

    public function product(){
        return $this->hasOne(Product::class,'product_id','product_id');
    }
    public function variant(){
        return $this->hasOne(Productvarient::class,'varient_id','variant_id');
    }
}
