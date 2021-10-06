<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Topic
 * @package App\Models\Admin
 * @version September 27, 2021, 4:26 am UTC
 *
 * @property integer $order
 * @property string $name
 * @property string $slug
 * @property integer $grade_id
 * @property integer $subject_id
 * @property string $no
 */
class Topic extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'topics';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'order',
        'name',
        'slug',
        'grade_id',
        'subject_id',
        'no'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'order' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'grade_id' => 'integer',
        'subject_id' => 'integer',
        'no' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order' => 'required',
        'name' => 'required|string',
        'created_at' => 'required',
        'updated_at' => 'required',
        'slug' => 'nullable|string|max:255',
        'grade_id' => 'nullable',
        'subject_id' => 'nullable',
        'no' => 'nullable|string|max:18'
    ];

    
}
