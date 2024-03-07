<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function getData()
    {
        return response()->json(['data' => 'Hello from Laravel!']);
    }
}
