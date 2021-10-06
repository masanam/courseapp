<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Menu
 * @package App\Models\Admin
 * @version September 13, 2021, 9:54 am UTC
 *
 * @property integer $parent_id
 * @property integer $type
 * @property string $title
 * @property string $content
 * @property string $picture
 * @property string $meta_title
 * @property string $meta_keyword
 * @property string $description
 * @property string $link
 * @property integer $orderid
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 */
class Menu extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'menus';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'parent_id',
        'type',
        'title',
        'content',
        'picture',
        'meta_title',
        'meta_keyword',
        'description',
        'link',
        'orderid',
        'status',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'type' => 'integer',
        'title' => 'string',
        'content' => 'string',
        'picture' => 'string',
        'meta_title' => 'string',
        'meta_keyword' => 'string',
        'description' => 'string',
        'link' => 'string',
        'orderid' => 'integer',
        'status' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'nullable|integer',
        'type' => 'nullable|integer',
        'title' => 'required|string|max:191',
        'content' => 'nullable|string',
        'picture' => 'nullable|string|max:191',
        'meta_title' => 'nullable|string',
        'meta_keyword' => 'nullable|string',
        'description' => 'nullable|string',
        'link' => 'nullable|string|max:191',
        'orderid' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
