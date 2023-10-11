<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberDataPersonal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'member_data_personal';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'usia',
        'jenis_kelamin',
        'lokasi_geografis',
        'pendidikan',
        'penghasilan',
    ];
}
