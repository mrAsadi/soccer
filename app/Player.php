<?php

namespace App;

use Eloquent as Model;

/**
 * @property integer $id
 * @property string $thumbnail
 * @property string $name
 * @property string $lastname
 * @property string $description
 * @property string $height
 * @property string $weight
 * @property integer $age
 * @property string $address
 * @property Team[] $teams
 * @property User $creator
 */
class Player extends Model
{

    public $table = 'players';



    public $fillable = [
        'thumbnail',
        'name',
        'lastname',
        'description',
        'height',
        'weight',
        'age',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'thumbnail'=>'string',
        'name' => 'string',
        'lastname' => 'string',
        'description' => 'string',
        'height'=>'string',
        'weight'=>'string',
        'age'=>'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(){
        return $this->belongsToMany('App\Team','team_members','player_id','team_id')
            ->withPivot(['user_id'])
            ->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User');
    }

}
