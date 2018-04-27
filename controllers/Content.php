<?php namespace Xitara\Toolbox\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Content extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Xitara.Toolbox', 'toolbox', 'content');
    }
}
