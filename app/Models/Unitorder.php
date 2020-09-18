<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unitorder extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'unit_order_id';
    
    protected $fillable = [
         'order_id', 'status'
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
    
    public function getStatusNameAttribute(){
        switch ($this->status){
            case 0:
                return "NEW";
                break;
            case 1:
                return "ORDER CONFIRMED";
                break;
            case 2:
                return "ORDER REJECTED";   
                break;
            case 3:
                return "SEND FOR CLIENT CONFIRATION";   
                break;
            case 4:
                return "CLIENT REJECTED";   
                break;
             case 5:
                return "CLIENT ACCEPTED";   
                break;
             case 6:
                return "MATERIAL DISPATCHED";   
                break;
             case 7:
                return "MATERIAL RECIEVED";   
                break;
             case 8:
                return "WORK STARTED";   
                break;             
             case 9:
                return "QUALITY CHECK";   
                break;
            case 10:
                return "QUALITY OK";   
                break;            
            case 11:
                return "QUALITY FAILED";   
                break;              
            case 12:
                return "PAYMENT REQUESTED";   
                break;            
            case 13:
                return "PAYMENT RECIEVED";   
                break;            
            case 14:
                return "UNIFORM DISPATCHED";   
                break;
            case 15:
                return "MATERIALS OUT OF STOCK";
                break;
            default:
                return "SOMETHING WENT WRONG";   
        }
    }
    protected $appends = ['status_name'];
}
