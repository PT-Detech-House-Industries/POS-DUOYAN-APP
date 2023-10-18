<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberStample extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_stample'; // Nama tabel yang sesuai
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'member_id',
      'member_purchasing_id',
      'member_claim_stample_id',
      // 'quantity_purchased',
      // 'purchase_date',
      // 'purchase_card_number',
      // 'stample_card',
    ];

    public function memberPurchasing()
    {
      return $this->belongsTo(MemberPurchasing::class, 'member_purchasing_id');
    }

    public function member()
    {
      return $this->belongsTo(Member::class, 'member_id');
    }

    public function memberClaimStample()
    {
      return $this->belongsTo(MemberClaimStample::class, 'member_claim_stample_id');
    }
}
