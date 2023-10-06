<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    protected $table = 'default.cards';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'expire_at',
        'client_id',
        'id',
        'is_active',
        'application_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'number' => 'string',
        'expire_at' => 'string',
        'client_id' => 'integer',
        'id' => 'integer',
        'is_active' => 'boolean',
        'application_id' => 'string'
    ];


}
