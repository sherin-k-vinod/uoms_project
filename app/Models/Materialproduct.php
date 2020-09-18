<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materialproduct extends Model
{
    
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'material_product_id';
    
    protected $fillable = [
		'material_id', 'varient_id', 'required_size'
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function varients(){
        return $this->hasOne(Productvarient::class,'varient_id','varient_id');
    }      
    public function materials(){
        return $this->hasOne(Material::class,'material_id','varient_id');
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
