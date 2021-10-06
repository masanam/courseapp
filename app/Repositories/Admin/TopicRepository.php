<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Topic;
use App\Repositories\BaseRepository;

/**
 * Class TopicRepository
 * @package App\Repositories\Admin
 * @version September 27, 2021, 4:26 am UTC
*/

class TopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order',
        'name',
        'slug',
        'grade_id',
        'subject_id',
        'no'
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
        return Topic::class;
    }
}
