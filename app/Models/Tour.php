<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'category_id',
        'location_id',
        'name',
        'slug',
        'price',
        'duration',
        'img',
        'desc',
        'itinerary',
        'facility'
    ];


    public function Category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function Location(): BelongsTo {
     return $this->belongsTo(Location::class);
     }
}
