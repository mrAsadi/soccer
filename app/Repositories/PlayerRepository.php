<?php

namespace App\Repositories;

use App\Player;

/**
 * Class characterRepository
 * @package App\Repositories
 * @version July 29, 2019, 6:51 am UTC
*/

class PlayerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'lastname',
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
        return Player::class;
    }
}
