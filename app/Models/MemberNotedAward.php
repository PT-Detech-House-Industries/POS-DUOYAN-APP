<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberNotedAward extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_noted_award';
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'member_id',
      'award_id',
      'award_name',
      'description',
      'award_date',
    ];

    public function member()
    {
      return $this->belongsTo(Member::class, 'member_id');
    }

    public function award()
    {
      return $this->belongsTo(MemberDataAward::class, 'award_id');
    }
}
