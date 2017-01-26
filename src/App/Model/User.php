<?php

namespace App\Model;

use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser
{
    protected $table = 'user';

    protected $primaryKey = 'id';
        public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'last_name',
        'first_name',
        'permissions',
    ];
    public function entreprise()
    {
      return $this->belongsTo('App\Model\Entreprise');
    }
    protected $loginNames = ['username', 'email'];
}
