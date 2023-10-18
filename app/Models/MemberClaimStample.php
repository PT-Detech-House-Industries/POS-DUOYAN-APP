<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberClaimStample extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_claim_stample'; // Nama tabel yang sesuai
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'member_id',
      'product_id',
      'claim_date',
      'status_claim',
      'periode_claim',
    ];

    public function member()
    {
      return $this->belongsTo(Member::class, 'member_id');
    }

    public function product()
    {
      return $this->belongsTo(Product::class, 'product_id');
    }
}
