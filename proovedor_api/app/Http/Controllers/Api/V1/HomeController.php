<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\TicketResource;
use App\Models\Product;
use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
/**
 * @OA\Info(title="API Proovedor", version="1.0")
 *
 * @OA\Server(url="https://proveedor-api.herokuapp.com/api/v1/")
 */
class HomeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/products",
     *     tags={"Products"},
     *     summary="Mostrar Productos",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los productos."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        return ProductResource::collection(Product::query()->get());
    }

    /**
     * Display the specified resource.
     * Muestra el registro solicitado
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/products/{id}",
     *     tags={"Products"},
     *     summary="Mostrar información de un producto",
     *     @OA\Parameter(
     *         description="Parámetro necesario para la consulta de datos de un producto",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar info de una producto."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se ha encontrado el producto."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show($productId)
    {
        $product = Product::query()
            ->with(['category','brand','tickets'])
            ->find($productId);
        return new ProductResource($product);

    }

    /**
     * @OA\Get(
     *     path="/tickets",
     *     tags={"Tickets"},
     *     summary="Mostrar Tickets",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los productos."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index2()
    {
        return TicketResource::collection(Tickets::query()->get());
    }

    /**
     * Display the specified resource.
     * Muestra el registro solicitado
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @OA\Get(
     *     path="/tickets/{id}",
     *     tags={"Tickets"},
     *     summary="Mostrar información de un ticket",
     *     @OA\Parameter(
     *         description="Parámetro necesario para la consulta de datos de un ticket",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar información de un ticket."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="No se ha encontrado el ticket."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show2($id)
    {
        $ticket = Tickets::query()
            ->with(['products','users'])
            ->find($id);
        return TicketResource::make($ticket);

    }
}
