<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Problem
 * @package App\Models\Admin
 * @version September 27, 2021, 4:47 am UTC
 *
 * @property string $question
 * @property string $choices
 * @property string $answers
 * @property integer $subtopic_id
 * @property integer $answer_type
 * @property string $no
 * @property string $solutions
 * @property string $question_type
 */
class Problem extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'problems';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'question',
        'choices',
        'answers',
        'subtopic_id',
        'answer_type',
        'no',
        'solutions',
        'question_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question' => 'string',
        'choices' => 'string',
        'answers' => 'string',
        'subtopic_id' => 'integer',
        'answer_type' => 'integer',
        'no' => 'string',
        'solutions' => 'string',
        'question_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required|string',
        'choices' => 'nullable|string',
        'answers' => 'required|string',
        'subtopic_id' => 'nullable',
        'created_at' => 'required',
        'updated_at' => 'required',
        'answer_type' => 'required',
        'no' => 'required|string|max:50',
        'solutions' => 'nullable|string',
        'question_type' => 'nullable|string|max:2'
    ];

    
}
