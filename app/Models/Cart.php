<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vendor_id', 'seller_id', 'crop_id', 'quantity'];

    // public function vendor()
    // {
    //     return $this->belongsTo(User::class, 'vendor_id', 'id');
    // }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
