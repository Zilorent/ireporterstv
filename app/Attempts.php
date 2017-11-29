<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempts extends Model
{
    protected $table = 'attempts';

    protected $primaryKey = 'session_id';

    public $timestamps = false;
}
