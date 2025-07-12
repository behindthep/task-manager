<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class PageController extends Controller
{
    public function notFound(): Response
    {
        return response()->view('errors.404', [], 404);
    }
}
