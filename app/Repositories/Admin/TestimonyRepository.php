<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Testimony;
use App\Repositories\BaseRepository;

/**
 * Class TestimonyRepository
 * @package App\Repositories\Admin
 * @version September 19, 2021, 1:10 pm UTC
*/

class TestimonyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fullname',
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
        return Testimony::class;
    }
}
