<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\MeResource;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class MeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return response()->json(new MeResource(auth()->user()));
    }

    public function store_update(UpdateProfileRequest $request)
    {
        if (request('password')) {
            $password = bcrypt(request('password'));
        } elseif (auth()->user()->password) {
            $password = auth()->user()->password;
        } else {
            $password = null;
        }
        $attributes =  $request->toArray();
        $attributes['password'] = $password;
        User::whereUuid(auth()->user()->uuid)->update($attributes);
        return response()->json([
            'message' => 'Berhasil Update Akun.'
        ]);
    }

    public function delete($uuid)
    {
        $delete = User::where('uuid', $uuid)->delete();

        if ($delete) {
            return response()->json([
                'message' => "Berhasil Menghapus User."
            ]);
        } else {
            return response()->json([
                'message' => "Gagal Menghapus User."
            ]);
        }
    }
}
