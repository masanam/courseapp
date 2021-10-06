<?php

namespace App\Repositories\Admin;

use App\Models\Admin\UserTypes;
use App\Repositories\BaseRepository;

/**
 * Class UserTypesRepository
 * @package App\Repositories\Admin
 * @version September 12, 2021, 4:04 pm UTC
*/

class UserTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'name',
        'level'
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
        return UserTypes::class;
    }
}
