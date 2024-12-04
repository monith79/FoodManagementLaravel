<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'availability', 'cuisine_id'];

    // Relationship: A food belongs to a cuisine
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
}
