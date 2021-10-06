<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Feature;
use App\Repositories\BaseRepository;

/**
 * Class FeatureRepository
 * @package App\Repositories\Admin
 * @version September 19, 2021, 1:00 pm UTC
*/

class FeatureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'title',
        'slug',
        'description',
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
        return Feature::class;
    }
}
