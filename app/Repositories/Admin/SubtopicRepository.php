<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Subtopic;
use App\Repositories\BaseRepository;

/**
 * Class SubtopicRepository
 * @package App\Repositories\Admin
 * @version September 27, 2021, 4:27 am UTC
*/

class SubtopicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order',
        'name',
        'topic_id',
        'slug',
        'no',
        'youtube_url'
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
        return Subtopic::class;
    }
}
