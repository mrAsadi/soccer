<?php

namespace App\Repositories;

use App\Team;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class characterRepository
 * @package App\Repositories
 * @version July 29, 2019, 6:51 am UTC
*/

class TeamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
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
        return Team::class;
    }
}
