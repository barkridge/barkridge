<?php

namespace App\Http\Controllers;

use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function show(string $slug)
    {
        $redirect = Redirect::where('slug', $slug)->firstOrFail();

        return redirect($redirect->url);
    }
}
