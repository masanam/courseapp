<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subject
 * @package App\Models\Admin
 * @version September 27, 2021, 4:30 am UTC
 *
 * @property string $name
 * @property string $value
 */
class Subject extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subjects';
    
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
        'name' => 'required|string|max:200',
        'created_at' => 'required',
        'updated_at' => 'required',
        'deleted_at' => 'nullable',
        'value' => 'nullable|string|max:2'
    ];

    
}
