<?php

namespace App\Repositories;

use App\Models\UserRole;

/**
 * Class RoleRepository
*/

class AssignRoleRepository extends BaseRepository
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
        return UserRole::class;
    }
}
