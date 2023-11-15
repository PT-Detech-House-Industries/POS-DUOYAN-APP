<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberAwardRecord extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'member_award_record';

    protected $fillable = [
        'member_award_id', 
        'member_id'
    ]; // Atribut yang dapat diisi

    public function member()
    {
      return $this->belongsTo(Member::class, 'member_id');
    }

    public function award()
    {
      return $this->belongsTo(MemberAward::class, 'member_award_id');
    }
}
