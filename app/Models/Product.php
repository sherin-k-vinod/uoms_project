<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'product_id';
    
    protected $fillable = [
        'client_id','name','gender', 'size',
    ];

  
      /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function client(){
        return $this->hasOne(Client::class,'client_id','client_id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getGenderNameAttribute(){
    	if($this->gender == 1) return "Male";
    	else return "Female";
    }

    protected $appends = ['gender_name'];
}
