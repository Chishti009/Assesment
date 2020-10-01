<?php

namespace App\Repositories;

use App\Models\abc;
use App\Repositories\BaseRepository;

/**
 * Class abcRepository
 * @package App\Repositories
 * @version September 30, 2020, 10:23 pm UTC
*/

class abcRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return abc::class;
    }
}
