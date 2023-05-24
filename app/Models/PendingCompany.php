<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PendingCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'location_id',
        'category_id',
        'description',
        'address',
        'phone',
        'logo',
        'instagram',
        'website',
        'facebook'
    ];

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function logo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('uploads/'.$value),
        );
    }
}
