<?php

namespace App\Nova\Metrics\Photo;

use App\Models\Photo;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;

class PhotosPerDay extends Trend
{
    public function calculate(NovaRequest $request)
    {
        return $this->countByDays($request, Photo::class);
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
        return 'photo-photos-per-day';
    }
}
