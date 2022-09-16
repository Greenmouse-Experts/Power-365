<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        // 'name', 
        // 'email', 
        'amount', 
        'transaction_id', 
        'ref_id', 
        'paid_at', 
        'channel', 
        'ip_address', 
        'status'
    ];
}
