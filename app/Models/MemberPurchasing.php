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
      'invoice',
      'quantity_purchased',
      'total_price',
      'purchase_date',
      'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // // Kolom-kolom yang harus di-cast ke jenis data tertentu
    // protected $casts = [
    //   'total_price' => 'decimal:2', // Mengcast kolom total_price sebagai decimal dengan 2 desimal
    //   'purchase_date' => 'date', // Mengcast kolom purchase_date sebagai tipe date
    // ];

    // // Format status untuk menyesuaikan dengan pilihan 'paid' dan 'unpaid'
    // public function getStatusAttribute($value)
    // {
    //     return $value === 'paid' ? 'Lunas' : 'Tidak Lunas';
    // }

    // // Relasi dengan model Member
    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'member_id');
    // }
}
