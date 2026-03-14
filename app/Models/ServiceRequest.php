<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $table = 'service_requests';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'message',
        'status',
        'scheduled_date',
        'admin_notes',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'scheduled_date',
    ];

    // Service options available
    public static function getServiceOptions()
    {
        return [
            'checkup' => 'General Check-up',
            'vaccination' => 'Vaccination',
            'emergency' => 'Emergency Care',
            'followup' => 'Follow-up Consultation',
        ];
    }
}
