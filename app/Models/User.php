<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [
        'id'
    ];
    public $timestamps = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }

    public function officers()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }

    public function midwife()
    {
        return $this->belongsTo(Midwife::class, 'midwife_id');
    }

    public function kades()
    {
        return $this->belongsTo(KepalaDesa::class, 'kepalaDesa_id');
    }

    public function puskesmas()
    {
        return $this->belongsTo(Puskesmas::class, 'puskesmas_id');
    }

    public function immunization()
    {
        return $this->belongsTo(Immunization::class);
    }

    public function weighing()
    {
        return $this->belongsTo(Weighing::class);
    }

    public static function countAdmin()
    {
        return self::where('role', 'admin')->count();
    }

    public function complaints()
    {
        return $this->hasMany(Complaints::class);
    }
}
