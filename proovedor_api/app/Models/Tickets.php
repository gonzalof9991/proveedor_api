<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_ticket','ticket_id','product_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
