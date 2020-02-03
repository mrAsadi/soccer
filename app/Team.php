<?php

namespace App;

use Eloquent as Model;

/**
 * @property integer $id
 * @property string $thumbnail
 * @property string $name
 * @property string $title
 * @property string $description
 * @property Player[] $members
 * @property User $creator
 */
class Team extends Model
{

    public $table = 'teams';


    public $fillable = [
        'thumbnail',
        'name',
        'title',
        'description',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'thumbnail'=>'string',
        'name' => 'string',
        'title' => 'string',
        'description'=>'string',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(){
        return $this->hasMany('App\Player','team_members','team_id','player_id')
            ->withPivot(['creator'])
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
