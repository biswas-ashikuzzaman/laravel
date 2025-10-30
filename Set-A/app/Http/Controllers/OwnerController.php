<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function show($id)
    {
        $owner = Owner::with('car')->findOrFail($id);
        return response()->json($owner);
    }
}