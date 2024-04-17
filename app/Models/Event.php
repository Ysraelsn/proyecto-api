<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'customer_id',
        'location_id',
        'hire_date',
        'status',
        'budget_used',
        'notes',
        'event_date',
        'attendance',
        'feedback',
        'completion_date',
        'organizer_id',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Get the client associated with the event.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function service(): BelongsTo {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class,'organizer_id');
    }
}