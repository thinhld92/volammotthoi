<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'cAccName',
        'amount',
        'coin',
        'status',
        'image',
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'cAccName', 'cAccName');
    }

    public function getStatusNameAttribute(){
        // dd($this->status);
        return __(PaymentStatus::getKey((int) $this->status));
    }

    public function getPaymentDateAttribute()
    {
        $payment_date = date('d-m-Y H:i:s', strtotime($this->created_at));
        return $payment_date;
    }

    public function account_habitus(){
        return $this->belongsTo(AccountHabitus::class, 'cAccName', 'cAccName');
    }
}
