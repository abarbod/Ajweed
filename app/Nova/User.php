<?php

namespace App\Nova;

use App\Rules\SaudiOfficialId;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;

/**
 * @property string full_name
 */
class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'full_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'first_name',
        'father_name',
        'grandfather_name',
        'last_name',
        'mobile',
        'official_id',
        'email',
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
            ID::make(__('ID'), 'id')
              ->sortable(),

            Gravatar::make(__('Avatar'))
                    ->resolveUsing(function () { // Important to prevent avatar download link.
                    })
                    ->preview($this->avatarCallback())
                    ->thumbnail($this->avatarCallback()),

            Text::make(__('First Name'), 'first_name')
                ->onlyOnForms()
                ->rules(['required', 'string', 'max:255']),

            Text::make(__('Father Name'), 'father_name')
                ->onlyOnForms()
                ->rules(['required', 'string', 'max:255']),

            Text::make(__('Grandfather Name'), 'grandfather_name')
                ->onlyOnForms()
                ->rules(['required', 'string', 'max:255']),

            Text::make(__('Last Name'), 'last_name')
                ->onlyOnForms()
                ->rules(['required', 'string', 'max:255']),

            Text::make(__('Name'), function () {
                return $this->full_name;
            }),

            Text::make(__('E-Mail Address'), 'email')
                ->sortable()
                ->rules(['required', 'email', 'max:255',])
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Text::make(__('Username'), 'username')
                ->sortable()
                ->rules(['required', 'string', 'min:4', 'max:255',])
                ->creationRules(['unique:users'])
                ->updateRules(['unique:users,username,{{resourceId}}']),

            Password::make(__('Password'), 'password')
                    ->onlyOnForms()
                    ->creationRules('required', 'string', 'min:6')
                    ->updateRules('nullable', 'string', 'min:6'),

            Text::make(__('Mobile Number'), 'mobile')
                ->rules(['required', 'regex:/^05\d{8}$/'])
                ->creationRules('unique:users')
                ->updateRules(['unique:users,mobile,{{resourceId}}']),

            Text::make(__('Saudi Id / Iqama Id'), 'official_id')
                ->hideFromIndex()
                ->rules(['required', 'digits:10', new SaudiOfficialId])
                ->creationRules(['unique:users'])
                ->updateRules(['unique:users,official_id,{{resourceId}}']),

            HasOne::make(__('Profile'), 'profile', Profile::class),

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
        return __('Users');
    }

    /**
     * Get the displayble singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('User');
    }

    /**
     * Determine if the given resource is authorizable.
     * We disable Nova authorization until we build the authorization system.
     *
     * @return bool
     */
    public static function authorizable()
    {
        return false;
    }

    /**
     * Return a callback to use with Gravatar input field.
     * We delegate to the User avatar method.
     * Will return a photo url if there is one on file, or a gravatar link.
     *
     * @return \Closure
     */
    protected function avatarCallback()
    {
        return function () {
            return $this->avatarUrl(300);
        };
    }

}
