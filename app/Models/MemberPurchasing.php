<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberPurchasing extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_purchasing';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'member_id',
        'product_id',
        'total_price',
        'purchase_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
