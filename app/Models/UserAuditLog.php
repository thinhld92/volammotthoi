<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuditLog extends Model
{
    use HasFactory;

    protected $table = 'user_audit_logs';

    protected $fillable = [
        'user_id',
        'cAccName',
        'action_type',
        'old_value',
        'new_value',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
