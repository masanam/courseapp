<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Section;
use App\Repositories\BaseRepository;

/**
 * Class SectionRepository
 * @package App\Repositories\Admin
 * @version September 19, 2021, 1:06 pm UTC
*/

class SectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'title',
        'slug',
        'picture',
        'orderid',
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
        return Section::class;
    }
}
