<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    //

    protected $table ='utilisateurs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
    ];

    protected $hidden = [
        'password',
    ];
}
