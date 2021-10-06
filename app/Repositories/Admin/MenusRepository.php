<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Menus;
use App\Repositories\BaseRepository;

/**
 * Class MenusRepository
 * @package App\Repositories\Admin
 * @version September 13, 2021, 9:50 am UTC
*/

class MenusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'type',
        'title',
        'content',
        'picture',
        'meta_title',
        'meta_keyword',
        'description',
        'link',
        'orderid',
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
        return Menus::class;
    }
}
