<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeInUseInformations extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'form_status',
        'admin_name_verifier',
        'salutation',
        'full_name',
        'address',
        'village',
        'road',
        'subdistrict',
        'district',
        'province',
    ];

    public function details()
    {
        return $this->hasOne(ChangeInUseFormDetails::class, 'change_in_use_id');
    }
}
