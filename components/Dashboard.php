<?php namespace Xitara\Toolbox\Components;

use Cms\Classes\ComponentBase;

class Dashboard extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Dashboard',
            'description' => 'Dashboard for Toolbox 3',
        ];
    }

    public function defineProperties()
    {
        return [
            'country' => [
                'title' => 'Country',
                'type' => 'dropdown',
                'default' => 'us',
            ],
            'state' => [
                'title' => 'State',
                'type' => 'dropdown',
                'default' => 'dc',
                'depends' => ['country'],
                'placeholder' => 'Select a state',
            ],
            'city' => [
                'title' => 'City',
                'type' => 'string',
                'default' => 'Washington',
                'placeholder' => 'Enter the city name',
                'validationPattern' => '^[0-9a-zA-Z\s]+$',
                'validationMessage' => 'The City field is required.',
            ],
            'units' => [
                'title' => 'Units',
                'description' => 'Units for the temperature and wind speed',
                'type' => 'dropdown',
                'default' => 'imperial',
                'placeholder' => 'Select units',
                'options' => ['metric' => 'Metric', 'imperial' => 'Imperial'],
            ],
        ];
    }
}
