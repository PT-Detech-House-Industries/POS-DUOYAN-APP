<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPurchasing extends Model
{
    use HasFactory;

    protected $table = 'member_purchasing';
    protected $fillable = [
        'member_id',
        'product_name',
        'total_price',
        'purchase_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
