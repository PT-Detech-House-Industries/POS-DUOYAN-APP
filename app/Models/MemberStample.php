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
      'name', 
      'age', 
      'address',
    ];
}
