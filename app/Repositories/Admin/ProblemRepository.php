<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Problem;
use App\Repositories\BaseRepository;

/**
 * Class ProblemRepository
 * @package App\Repositories\Admin
 * @version September 27, 2021, 4:47 am UTC
*/

class ProblemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Problem::class;
    }
}
