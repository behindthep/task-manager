<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ErrorPageController extends Controller
{
    public function notFound(): Response
    {
        return response()->view('errors.404', data: [], status: 404);
    }
}
