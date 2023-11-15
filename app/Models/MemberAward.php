<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberAward extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'member_award';
    
    protected $fillable = [
        'name', 
        'point_minimum'
    ]; // Atribut yang dapat diisi

    // Jika Anda tidak menginginkan atribut created_at dan updated_at di model ini:
    public $timestamps = false;
}
