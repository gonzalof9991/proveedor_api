<?php

namespace App\Http\Controllers\Api\V1\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //url contra la que atacamos
        //$ch = curl_init("https://apiseguridad.azure-api.net/proveedor/products");
        $ch = curl_init("https://claudiorigollet.cl/api/products");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Ocp-Apim-Subscription-Key: 7d1ef2177b0c43feb04fcbc90b70d8f5', 'Access-Control-Allow-Origin:*'));

        $response = curl_exec($ch);
        curl_close($ch);

        if(!$response) {
            return response()->json('error in form', 406);
        }

        return $response;
    }


    public function store(Request $request)
    {
        // URL
        //$ch = curl_init("https://apiseguridad.azure-api.net/proveedor/products");
        $ch = curl_init("https://claudiorigollet.cl/api/products");

        $data = [
            'name' => $request->json(['name']),
            'slug' => $request->json(['slug']),
            'description' => $request->json(['description']),
            'price' => $request->json(['price']),
            'quantity' => $request->json(['quantity']),
            'subcategory_id' => $request->json(['subcategory_id']),
        ];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Ocp-Apim-Subscription-Key: 7d1ef2177b0c43feb04fcbc90b70d8f5', 'Access-Control-Allow-Origin:*'));

        $response = curl_exec($ch);
        curl_close($ch);

        if(!$response) {
            return response()->json('error in form', 406);
        }

        return $response;
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
