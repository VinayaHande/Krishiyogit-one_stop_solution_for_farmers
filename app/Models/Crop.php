<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'photo',
        'available_quantity',
        'price',
        'unit',
        'status',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
