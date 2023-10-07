<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relationship
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    public function fruitItem()
    {
        return $this->belongsTo(FruitItem::class);
    }
}
