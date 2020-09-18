<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
         

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'order_id';
    
    protected $fillable = [
         'client_id', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lines(){
        return $this->hasMany(Orderlines::class,'order_id','order_id');
    }  
    public function unitorder(){
        return $this->hasOne(Unitorder::class,'order_id','order_id')->withDefault([
            'expected_completion_date'  =>'',
            'expected_completion_time'  =>''
        ]);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getStatusNameAttribute(){
        switch ($this->status){
            case 0:
                return "NEW";
                break;
            case 1:
                return "ADMIN PROCESSED";
                break;
            case 2:
                return "SEND FOR UNIT CONFIRATION";   
                break;
            case 3:
                return "UNIT ACCEPTED";   
                break;
            case 4:
                return "UNIT REJECTED";   
                break;
             case 5:
                return "CLIENT CONFIRMED";   
                break;
             case 6:
                return "CLIENT REJECTED";   
                break; 
            case 7:
                return "MATERIALS DISPATCHED";   
                break;
            case 8:
                return "MATERIALS COLLECTED";   
                break;
            case 9:
                return "WORK STARTED";   
                break;            
            case 10:
                return "QUALITY CHECK";   
                break;            
            case 11:
                return "QUALITY CHECK OK";   
                break;            
            case 12:
                return "QUALITY CHECK FAILED";   
                break;            
            case 13:
                return "UNIFORM DISPATCHED FROM UNIT";   
                break;            
            case 14:
                return "UNIT PAYMENT REQUESTED";   
                break;
            case 15:
                return "MATERIALS OUT OF STOCK";
                break;            
            case 16:
                return "STOCK ADDED";
                break;
            default:
                return "SOMETHING WENT WRONG";   
        }
    }
    protected $appends = ['status_name'];
}