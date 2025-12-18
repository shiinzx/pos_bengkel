<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    protected $fillable = ['customer_id','total'];
    public function customer()
    { 
        return $this->belongsTo(Customer::class); 
    }
    public function items()
    { 
        return $this->hasMany(TransactionItem::class); 
    }
    public function service()
    { 
        return $this->belongsTo(Service::class); 
    }
}
