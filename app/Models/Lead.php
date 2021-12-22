<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'email', 
            'phone_number',
            'birth_date',
            'location',
            'city',
            'province',
            'country',
            'postal_code',
            'types',
            'is_gdpr',
            'contract_signing_date',
            'contract_end_date',
            'is_leagal',
            'export_type',
            'status',    
            'notes'
        ];
}
