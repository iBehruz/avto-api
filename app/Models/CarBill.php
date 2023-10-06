<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBill extends Model
{
    use HasFactory;


    protected $table = 'default.car_bill';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'credit_amount',
        'monthly_amount',
        'pre_amount',
        'insurance_amount',
        'month',
        'application_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'credit_amount' => 'float',
        'pre_amount' => 'float',
        'monthly_amount' => 'float',
        'insurance_amount' => 'float',
        'month' => 'integer',
        'application_id' => 'integer'
    ];



}
