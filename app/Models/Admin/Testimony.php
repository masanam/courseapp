<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Testimony
 * @package App\Models\Admin
 * @version September 19, 2021, 1:10 pm UTC
 *
 * @property string $fullname
 * @property string $title
 * @property string $slug
 * @property string $picture
 * @property integer $orderid
 * @property string $description
 * @property integer $created_by
 * @property integer $updated_by
 */
class Testimony extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'testimonies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fullname',
        'title',
        'slug',
        'picture',
        'orderid',
        'description',
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
        'fullname' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'picture' => 'string',
        'orderid' => 'integer',
        'description' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fullname' => 'required|string|max:100',
        'title' => 'required|string|max:191',
        'slug' => 'nullable|string|max:191',
        'picture' => 'nullable|string|max:255',
        'orderid' => 'nullable|integer',
        'description' => 'nullable|string',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
