<?php namespace Xitara\SnippetPool\Models;

use Model;

/**
 * Tag Model
 */
class Tag extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_snippetpool_tags';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
