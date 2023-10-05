<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FruitItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relationship
    public function fruitCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FruitCategory::class);
    }
}
