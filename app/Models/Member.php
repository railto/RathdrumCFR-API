<?php

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use UsesUUID;
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address_1',
        'address_2',
        'eircode',
        'title',
        'status',
        'cfr_certificate_number',
        'cfr_certificate_expiry',
        'volunteer_declaration',
        'garda_vetting_id',
        'garda_vetting_date',
        'cism_completed',
        'child_first_completed',
        'ppe_community_completed',
        'ppe_acute_completed',
        'hand_hygiene_completed',
        'hiqa_completed',
        'covid_return_completed',
        'ppe_assessment_completed',
    ];

    protected $casts = [
        'cfr_certificate_expiry' => 'date:Y-m-d',
        'volunteer_declaration' => 'date:Y-m-d',
        'garda_vetting_date' => 'date:Y-m-d',
        'cism_completed' => 'date:Y-m-d',
        'child_first_completed' => 'date:Y-m-d',
        'ppe_community_completed' => 'date:Y-m-d',
        'ppe_acute_completed' => 'date:Y-m-d',
        'hand_hygiene_completed' => 'date:Y-m-d',
        'hiqa_completed' => 'date:Y-m-d',
        'covid_return_completed' => 'date:Y-m-d',
        'ppe_assessment_completed' => 'date:Y-m-d',
    ];

    protected static function booted()
    {
        static::creating(function ($member) {
            $member->user_id = auth()->user()->id;
        });
    }
}
