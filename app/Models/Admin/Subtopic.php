<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subtopic
 * @package App\Models\Admin
 * @version September 27, 2021, 4:27 am UTC
 *
 * @property integer $order
 * @property string $name
 * @property integer $topic_id
 * @property string $slug
 * @property string $no
 * @property string $youtube_url
 */
class Subtopic extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subtopics';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'order',
        'name',
        'topic_id',
        'slug',
        'no',
        'youtube_url'
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
        'topic_id' => 'integer',
        'slug' => 'string',
        'no' => 'string',
        'youtube_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order' => 'required',
        'name' => 'required|string|max:255',
        'topic_id' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
        'slug' => 'nullable|string|max:255',
        'no' => 'nullable|string|max:25',
        'youtube_url' => 'nullable|string'
    ];

    
}
