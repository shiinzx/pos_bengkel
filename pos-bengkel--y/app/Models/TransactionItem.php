<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model {
    protected $fillable = ['transaction_id','service_id','qty','harga','subtotal'];
    public function service(){ return $this->belongsTo(Service::class); }
}

