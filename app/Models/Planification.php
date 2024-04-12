<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;
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
        'event_id',
        'company_id',
        'hire_date',
        'status',
        'budget_used',
        'notes',
        'start_date',
        'end_date',
        'attendance',
        'feedback',
        'completion_date',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'hire_date' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'completion_date' => 'date',
    ];

    /**
     * Get the event associated with the planification.
     */
    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }

    /**
     * Get the company associated with the planification.
     */
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}