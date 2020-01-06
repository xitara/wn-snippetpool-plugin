<?php namespace Xitara\SnippetPool\Models;

use Model;

/**
 * Model
 */
class Snippets extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $requiredPermissions = ['xitara.snippetpool.snippets'];

    /**
     * @var array Validation rules
     */
    public $rules = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_snippetpool_snippets';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'groups' => [
            'Xitara\SnippetPool\Models\Group',
            'table' => 'xitara_snippetpool_snippets_groups',
            'key' => 'snippet_id',
            'otherKey' => 'group_id',
        ],
        'tags' => [
            'Xitara\SnippetPool\Models\Tag',
            'table' => 'xitara_snippetpool_snippets_tags',
            'key' => 'tag_id',
            'otherKey' => 'snippet_id',
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => 'System\Models\File',
    ];
}
