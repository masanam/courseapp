<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sliders
 * @package App\Models\Admin
 * @version September 13, 2021, 6:59 am UTC
 *
 * @property string $title
 * @property string $description
 * @property string $picture
 * @property integer $orderid
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 */
class Sliders extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sliders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'picture',
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
        'title' => 'string',
        'description' => 'string',
        'picture' => 'string',
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
        'title' => 'required|string|max:191',
        'description' => 'nullable|string',
        'picture' => 'required|string|max:191',
        'orderid' => 'nullable|integer',
        'status' => 'nullable|integer',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
