<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
        'first_name',
        'second_name',
        'surname',
        'second_surname',
        'email',
        'phone_number',
        'age',
        'budget',
    ];
    public function setAgeAttribute($value)
{
    $this->attributes['age'] = (int) $value;
}

public function setBudgetAttribute($value)
{
    $this->attributes['budget'] = (int) $value;
}
}
