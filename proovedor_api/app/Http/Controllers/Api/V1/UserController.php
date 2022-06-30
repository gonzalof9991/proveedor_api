<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query()
            ->with(['ticket'])
            ->get();
        return UserResource::collection($users);
    }


    public function store(Request $request): UserResource
    {

        $userId = User::query()->latest()->get('id')->first();
        if($userId){
            $userId = $userId->id;
            $userId = $userId + 1;
        }
        else{
            $userId = 1;
        }
        $user = User::create([
            'id' => $userId,
            'name' => $request->json(['name']),
            "email" => $request->json(['email']),
            "password" => $request->json(['password']),
            "type_of_user_id" => $request->json(['type_of_user_id'])
        ]);
        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::query()
            ->with(['ticket'])
            ->find($id);
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
