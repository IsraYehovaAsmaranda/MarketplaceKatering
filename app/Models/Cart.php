<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = ['user_id', 'food_id', 'qty'];

    public function customer(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function food(): BelongsTo{
        return $this->belongsTo(Food::class, 'food_id');
    }
}
