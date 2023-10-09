<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalInformations extends Model
{
    use HasFactory;

    protected $table = 'default.additional_information';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'education',
        'family_status',
        'childs_number',
        'application_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'education' => 'integer',
        'family_status' => 'integer',
        'childs_number' => 'integer',
        'application_id' => 'integer'
    ];

}
