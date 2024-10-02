<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'imagepath',
        'price',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
