<?php namespace Xitara\Toolbox\Models;

use Model;

/**
 * Model
 */
class ContentPortals extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'xitara_toolbox_content_portals';
}
