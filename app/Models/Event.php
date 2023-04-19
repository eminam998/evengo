<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'location_id',
        'name',
        'description',
        'image',
        'date',
        'time',
        'address',
        'guest_number'
    ];

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('uploads/'.$value),
        );
    }
}
