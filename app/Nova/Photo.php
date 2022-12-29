<?php

namespace App\Nova;

use App\Services\HelperService;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Photo extends Resource
{
    public static $model = \App\Models\Photo::class;

    public static $title = 'file_name';

    public static $search = [
        'id', 'slug', 'file', 'file_name'
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Slug')
                ->rules('required', 'alpha_num')
                ->creationRules('unique:photos,slug')
                ->updateRules('unique:photos,slug,{{resourceId}}')
                ->default(function (): string {
                    return resolve(HelperService::class)->generateSlug();
                }),

            Image::make('File')
                ->rules('required')
                ->storeOriginalName('file_name')
                ->storeSize('file_size'),

            Text::make('File Name')
                ->exceptOnForms(),

            Text::make('File Size')
                ->exceptOnForms()
                ->displayUsing(function ($value) {
                    return number_format($value / 1024, 2) . 'kb';
                }),

            DateTime::make('Created At')
                ->sortable()
                ->exceptOnForms(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [
            \App\Nova\Metrics\Photo\PhotosPerDay::make(),
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
