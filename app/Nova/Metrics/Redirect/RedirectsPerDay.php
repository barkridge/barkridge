<?php

namespace App\Nova\Metrics\Redirect;

use App\Models\Redirect;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class RedirectsPerDay extends Trend
{
    public function calculate(NovaRequest $request)
    {
        return $this->countByDays($request, Redirect::class);
    }

    public function ranges()
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    public function uriKey()
    {
        return 'redirect-redirects-per-day';
    }
}
