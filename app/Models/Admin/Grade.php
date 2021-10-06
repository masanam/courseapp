<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Grade
 * @package App\Models\Admin
 * @version September 27, 2021, 4:27 am UTC
 *
 * @property string $name
 * @property string $value
 */
class Grade extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'grades';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'created_at' => 'required',
        'updated_at' => 'required',
        'value' => 'nullable|string|max:2'
    ];

    
}
