<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHabitus extends Model
{
    use HasFactory;

    protected $table = "Account_Habitus";
    public $timestamps = false;
    public $primaryKey = 'iid';

    protected $fillable = [
        'cAccName',
        'iFlag',
        'iLeftSecond',
        'nExtPoint',
        'nExtPoint2',
        'dBeginDate',
        'iLeftMonth',
        'dEndDate'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'cAccName', 'cAccName');
    }
}
