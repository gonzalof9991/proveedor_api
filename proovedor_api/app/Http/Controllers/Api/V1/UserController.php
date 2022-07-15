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


    public function show($id)
    {
        $user = User::query()
            ->with(['ticket'])
            ->find($id);
        return UserResource::make($user);
    }


    public function update(Request $request, User $user)
    {
        echo $request->json(['type_of_user_id']);
        $data = [
            "name" => $request->json(['name']),
            "password" => $request->json(['password']),
            "email" => $request->json(['email']),
            "type_of_user_id" => $request->json(['type_of_user_id'])
        ];

        $userId = $user->getAttribute('id');
        $userId = User::query()->find($userId);
        $user->update($data);
        return UserResource::make($user);
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
