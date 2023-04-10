<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'image',
        'images'
    ];


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('uploads/'.$value),
        );
    }

    protected function images(): Attribute
{
    return Attribute::make(
        get: function ($values) {
            $values = explode(',', $values);
            $urls = [];
            foreach ($values as $value) {
                if($value){
                $urls[] = url('uploads/'.$value);
                }
            }
            return $urls;
        },
    );
}


}
