<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Achievement
 * @package App\Models\Admin
 * @version September 27, 2021, 3:20 am UTC
 *
 * @property integer $category_id
 * @property string $title
 * @property string $seotitle
 * @property string $content
 * @property string $picture
 * @property integer $year
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 */
class Achievement extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'achievements';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'title',
        'seotitle',
        'content',
        'picture',
        'year',
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
        'category_id' => 'integer',
        'title' => 'string',
        'seotitle' => 'string',
        'content' => 'string',
        'picture' => 'string',
        'year' => 'integer',
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
        'category_id' => 'required|integer',
        'title' => 'required|string|max:191',
        'seotitle' => 'required|string|max:191',
        'content' => 'nullable|string',
        'picture' => 'required|string|max:191',
        'year' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
