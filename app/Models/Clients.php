<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;


    protected $table = 'default.clients';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'passport_number',
        'birth_date',
        'tin',
        'pinfl',
        'first_name',
        'last_name',
        'middle_name',
        'residence_address',
        'issued_by',
        'issued_at',
        'valid_date',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'passport_number' => 'string',
        'birth_date' => 'datetime',
        'tin' => 'string',
        'pinfl' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'middle_name' => 'string',
        'residence_address' => 'string',
        'issued_by' => 'string',
        'issued_at' => 'datetime',
        'valid_date' => 'datetime',
        'created_at' => 'datetime',
        'created_by' => 'integer',
        'updated_at' => 'datetime',
        'updated_by' => 'integer',
    ];

    protected $hidden = [
        "id"
    ];

}
