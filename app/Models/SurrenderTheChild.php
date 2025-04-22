<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurrenderTheChild extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_information_id',
        'full_name',
        'age',
        'occupation',
        'income',
        'village',
        'alley_road',
        'subdistrict',
        'district',
        'province',
        'phone_number',
        'childs_name',
        'contact_location',
        'salutation',
        'child_recipient',
        'child_recipient_relevant',
        'child_recipient_phone',
        'contact_phone',
        'child_recipient_related',
        'child_recipient_salutation',
        'child_surrender_salutation',
        'child_surrender_salutation1',
        'child_salutation',
        'hour_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function childInformation()
    {
        return $this->belongsTo(ChildInformation::class, 'child_information_id');
    }


    public function childRegistration()
    {
        return $this->belongsTo(ChildRegistration::class, 'child_registration_id');
    }
}
