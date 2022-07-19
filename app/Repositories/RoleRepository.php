<?php

namespace App\Repositories;

use App\Models\Role;

/**
 * Class RoleRepository
*/

class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'role',
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
        return Role::class;
    }
}
