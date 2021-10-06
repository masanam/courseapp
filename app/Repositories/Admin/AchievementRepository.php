<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Achievement;
use App\Repositories\BaseRepository;

/**
 * Class AchievementRepository
 * @package App\Repositories\Admin
 * @version September 27, 2021, 3:20 am UTC
*/

class AchievementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Achievement::class;
    }
}
