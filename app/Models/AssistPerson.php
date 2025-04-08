<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'written_at',
        'write_the_date',
        'learn',
        'salutation',
        'first_name',
        'last_name',
        'birth_day',
        'age',
        'nationality',
        'village',
        'alley',
        'road',
        'subdistrict',
        'district',
        'province',
        'postal_code',
        'phone_number',
        'citizen_id',
        'status',
        'admin_name_verifier',
        'community'
    ];

    /**
     * Relationship: AssistPerson belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Relationship: AssistPerson has many AssistImparting
     */
    public function assistImpartings()
    {
        return $this->hasMany(AssistImparting::class, 'assist_people_id');
    }

    /**
     * Relationship: AssistPerson has many AssistAttachment
     */
    public function assistAttachments()
    {
        return $this->hasMany(AssistAttachment::class, 'assist_people_id');
    }

    /**
     * Relationship: AssistPerson has many AssistReply
     */
    public function assistReplies()
    {
        return $this->hasMany(AssistReply::class, 'assist_people_id');
    }
}
