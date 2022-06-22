<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductTicketResource;
use App\Models\Product;
use App\Models\ProductTicket;
use Illuminate\Http\Request;

class ProductTicketController extends Controller
{



    public function store(Request $request)
    {
        $ticketId = $request->json(['ticket_id']);
        $productId = $request->json(['product_id']);
        $product = Product::find($ticketId)->tickets()->attach($ticketId,['product_id' => $productId]);
        return 201;
    }

}
