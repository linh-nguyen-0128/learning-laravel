<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index() {
        return view('index');
    }

    public function show(string $id) {
        return response()->json([
            'id' => $id,
            'name' => 'Linh',
            'age' => '22'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse {
        print_r($request->all());
        return response()->json([
            'name' => 'Linh',
            'age' => '22'
        ]);
    }
}
