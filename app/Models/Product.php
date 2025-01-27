<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['active','name','slug','model','category_id'];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
