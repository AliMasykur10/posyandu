<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function users()
    {
        return $this->hasMany(User::class, 'officer_id');
    }

    public static function countOfficer()
    {
        return self::count();
    }
}
