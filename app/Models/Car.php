<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'default.car';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tech_passport_number',
        'number',
        'score_file',
        'amount',
        'files',
        'application_id',
        'score_amount'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tech_passport_number' => 'string',
        'number' => 'string',
        'score_file' => 'integer',
        'amount' => 'double',
        'files' => 'json',
        'application_id' => 'integer',
        'score_amount' => 'double'
    ];

}
