<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Redirect extends Resource
{
    public static $model = \App\Models\Redirect::class;

    public static $title = 'slug';

    public static $search = [
        'id', 'slug',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Slug')
                ->rules('required', 'alpha_num')
                ->creationRules('unique:redirects,slug')
                ->updateRules('unique:redirects,slug,{{resourceId}}')
                ->default(function (): string {
                    return Str::random(8);
                }),

            Text::make('URL')
                ->rules('required', 'url'),

            DateTime::make('Created At')
                ->sortable()
                ->exceptOnForms(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
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
