<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitra = User::select('nama', 'asal_kota', 'role_id', 'uuid')->get();
        return response()->json(compact('mitra'));
    }
}
