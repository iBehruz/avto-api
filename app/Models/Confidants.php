<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confidants extends Model
{
    use HasFactory;

    protected $table = 'default.confidants';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'relation',
        'application_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name' => 'string',
        'phone' => 'string',
        'relation' => 'integer',
        'application_id' => 'integer'
    ];

}
