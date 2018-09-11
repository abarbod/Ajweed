<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Event';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'location',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Name'), 'name'),

            Textarea::make(__('Description'), 'description')
                    ->hideFromIndex(),

            Place::make(__('Location'), 'location'),

            Date::make(__('Start Date'), 'start_at'),

            Date::make(__('End Date'), 'end_at'),

            Text::make(__('Start Time'), 'start_time')
                ->hideFromIndex(),

            Text::make(__('End Time'), 'end_time')
                ->hideFromIndex(),

            Text::make(__('Rewards'), 'rewards')
                ->hideFromIndex(),

            Number::make(__('Count Male'), 'count_male')->min(0)
                  ->hideFromIndex(),

            Number::make(__('Count Female'), 'count_female')->min(0)
                  ->hideFromIndex(),

            Select::make(__('Registration Status'), 'registration_status')
                  ->options([
                      'open'   => __('open'),
                      'closed' => __('closed'),
                  ])->displayUsingLabels(),

            Boolean::make(__('Is Published'), 'published_at')
                   ->fillUsing(function (Request $request, \App\Models\Event $event) {
                       if ($request->input('published_at')) {
                           $event->published_at = now();
                       } else {
                           $event->published_at = null;
                       }
                   }),

            HasMany::make(__('Applications'), 'applications', Application::class),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }


    /**
     * Get the displayble label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Events');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Event');
    }

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->start_at->format($this->name . ' F Y');
    }

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function subtitle()
    {
        return $this->location;
    }

}
