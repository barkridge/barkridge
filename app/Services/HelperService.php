<?php

namespace App\Services;

use Illuminate\Support\Str;

class HelperService
{
    public function generateSlug(): string
    {
        return explode('-', Str::uuid())[0];
    }
}
