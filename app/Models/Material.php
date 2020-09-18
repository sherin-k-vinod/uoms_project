<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'material_id';
    
    protected $fillable = [
    	'name','available_stock'
     ];
    public function materialproduct(){
        return $this->hasMany(Materialproduct::class,'material_id','material_id');
    } 
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
