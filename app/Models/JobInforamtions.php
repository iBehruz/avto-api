<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobInforamtions extends Model
{
    use HasFactory;


    protected $table = 'default.job_informations';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employment',
        'profession',
        'application_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'employment' => 'integer',
        'profession' => 'integer',
        'application_id' => 'integer'
    ];


}
