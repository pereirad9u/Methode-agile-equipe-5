<?php

namespace App\Model;

use Cartalyst\Sentinel\Users\EloquentUser;

class AppelOffre extends EloquentUser
{
    protected $table = 'appeloffre';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function user()
    {
      return $this->belongsTo('App\Model\User');
    }

}
