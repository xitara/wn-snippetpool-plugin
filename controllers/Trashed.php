<?php namespace Xitara\SnippetPool\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

class Trashed extends Controller
{
    public $implement = ['Backend\Behaviors\ListController'];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Xitara.SnippetPool', 'snippetpool');
    }

    public function listExtendQuery($query)
    {
        // $query->trashed();
        $query->onlyTrashed();
        // $query->withTrashed();
    }

    // public function formExtendQuery($query)
    // {
    //     $query->withTrashed();
    // }
}
