<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products(): BelongsTo
    {
        return $this->hasMany(Product::class,'ticket_id');
    }

}
