<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberPurchasingDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'member_purchasing_detail';
    protected $fillable = [
        'member_purchasing_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Definisikan relasi dengan tabel MemberPurchasing
    public function memberPurchasing()
    {
        return $this->belongsTo(MemberPurchasing::class, 'member_purchasing_id');
    }

    // Definisikan relasi dengan tabel Product (jika dibutuhkan)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
