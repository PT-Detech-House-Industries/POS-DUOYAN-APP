<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberDataAward extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_data_award'; // Sesuaikan dengan nama tabel Anda
    protected $dates = ['deleted_at'];

    protected $fillable = [
        // 'member_id',
        'award_name',
        'description',
        'award_date',
    ];

    // Definisikan relasi jika diperlukan
    // public function member()
    // {
    //     return $this->belongsTo(Member::class, 'member_id');
    // }
}
