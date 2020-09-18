<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
        
            /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'invoice_id';
    
    protected $fillable = [
		'order_id', 'client_id'
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
                return "INVOICE GENERATED";
                break;            
            case 1:
                return "UNIT PAYMENT REQUESTED";
                break;            
            case 2:
                return "PAYMENT SEND TO UNIT";
                break;            
            case 3:
                return "SEND INVOICE TO CLIENT";
                break;            
            case 4:
                return "CLIENT PAID";
                break;
            default:
                return "SOMETHING WENT WRONG";   
                break;
        }
    }

    public function getClientStatusNameAttribute(){
        switch ($this->client_status){
            case 0:
                return "WAITING FOR INVOICE";
                break;               
            case 1:
                return "INVOICE RECIEVED";
                break;             
            case 2:
                return "PAID";
                break;            
            default:
                return "SOMETHING WENT WRONG";   
                break;
        }
    }
     protected $appends = ['status_name','client_status_name'];

}

