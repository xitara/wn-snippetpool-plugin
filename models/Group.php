<?php namespace Xitara\SnippetPool\Models;

use Model;

/**
 * Group Model
 */
class Group extends Model
{
    public $requiredPermissions = ['xitara.snippetpool.groups'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_snippetpool_groups';

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
        // 'groups' => [
        // 'Xitara\SnippetPool\Models\Group',
        // ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
