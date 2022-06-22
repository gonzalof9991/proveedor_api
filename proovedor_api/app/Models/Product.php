<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'products';

    protected $casts = [
        'id' => 'string',
    ];


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function tickets()
    {
        return $this->belongsToMany(Tickets::class,'product_ticket','product_id','ticket_id');
    }



}
