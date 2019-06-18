<?php namespace Xitara\SnippetPool\Models;

use Model;

/**
 * Model
 */
class Trashed extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_snippetpool_snippets';
}
