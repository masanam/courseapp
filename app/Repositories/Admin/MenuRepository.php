<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Menu;
use App\Repositories\BaseRepository;

/**
 * Class MenuRepository
 * @package App\Repositories\Admin
 * @version September 13, 2021, 9:54 am UTC
*/

class MenuRepository extends BaseRepository
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
        return Menu::class;
    }
}
