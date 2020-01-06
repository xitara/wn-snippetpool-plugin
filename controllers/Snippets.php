<?php namespace Xitara\SnippetPool\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Db;

class Snippets extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Xitara.SnippetPool', 'snippetpool', 'snippets.all');
    }

    public function index($groupId = 0)
    {
        if ($groupId > 0) {
            $this->vars['groupId'] = $groupId;

            $snippets = Db::table('xitara_snippetpool_snippets_groups')
                ->where('group_id', $groupId)
                ->get();

            foreach ($snippets as $id) {
                $this->vars['idList'][] = $id->snippet_id;
            }

            BackendMenu::setContext('Xitara.SnippetPool', 'snippetpool', 'snippets.' . $groupId);
        }

        $this->asExtension('ListController')->index();
    }

    public function listExtendQueryBefore($query)
    {
        // dump($this->vars['idList']);

        if (isset($this->vars['idList'])) {
            foreach ($this->vars['idList'] as $snippet_id) {
                $query->orWhere('id', $snippet_id);
            }
        } elseif (isset($this->vars['groupId'])) {
            $query->orWhere('id', 0);
        }

    }
}
