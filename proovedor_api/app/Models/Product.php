<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'products';

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Tickets::class,'ticket_id');
    }

}
