<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TicketResource;
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



    public function store(Request $request): TicketResource
    {
        $ticketId = Tickets::query()->get('id')->last();
        if($ticketId){
            $ticketId = $ticketId->id + 1;
        }
        else{
            $ticketId = 1;
        }

        $data = [
            "id" => $ticketId,
            "nro_ticket" => "nro-".$ticketId,
            "name" => $request->json(['name']),
            "send_to" => $request->json(['send_to']),
            "total_price" => $request->json(['total_price'])
        ];
        $ticket = Tickets::create($data);
        return TicketResource::make($ticket);
    }


    public function show($id)
    {
        $ticket = Tickets::query()
            ->with(['products'])
            ->find($id);
        echo $ticket;
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
