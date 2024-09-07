<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';

    protected $fillable = ['merchant_id', 'food_name', 'description', 'image_url', 'price'];

    public function merchant(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function cart(): HasMany{
        return $this->hasMany(Cart::class);
    }
}
