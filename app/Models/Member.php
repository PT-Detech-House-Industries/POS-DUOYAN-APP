<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama',
        // 'nomor_membership',
        'nomor_whatsapp',
        // nomor_whatsapp
    ];
}
