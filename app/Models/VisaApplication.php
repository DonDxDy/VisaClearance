<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaApplication extends Model
{
    use HasFactory;


    protected $fillable = [
        'date_of_birth',
        'first_name',
        'last_name',
        'other_names',
        'phone',
        'email',
        'address',
        'state_of_residence',
        'lga_of_origin',
        'state_of_origin',
        'evidence_business_status',
        'evidence_business_link',
        'evidence_of_cbn_payment',
        'tax_clearance',
        'certificate_of_lga_state',
        'passport_photograph',
        'international_passport',
        'application_for_clearance',
        'sponsor_letter',
        'statement_of_account_sponsor',
        'guarantor_1_names',
        'guarantor_2_names',
        'office_id',
        'gender',
        'country_of_birth',
        "status",
        'user_id'
    ];
}



