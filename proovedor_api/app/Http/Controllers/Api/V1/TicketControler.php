<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TicketResource;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketControler extends Controller
{
    public function index()
    {
        $tickets = Tickets::query()
            ->with(['products'])
            ->get();

        return TicketResource::collection($tickets);
    }



    public function store(Request $request)
    {
        echo $request;
    }


    public function show($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
