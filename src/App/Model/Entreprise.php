<?php

namespace App\Model;

use Cartalyst\Sentinel\Users\EloquentUser;

class Entreprise extends EloquentUser
{
    protected $table = 'entreprise';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nom'
    ];

    public function users()
    {
      return $this->hasMany('App\Model\User');
    }

    protected $loginNames = ['username', 'email'];
}
