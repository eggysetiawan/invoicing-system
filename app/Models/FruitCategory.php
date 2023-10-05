<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FruitCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    // relationship
    public function fruitItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FruitItem::class);
    }
}
