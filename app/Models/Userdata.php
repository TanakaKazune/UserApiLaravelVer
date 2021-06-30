<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $table = 'userdata';
    const CREATED_AT = NULL;
    const UPDATED_AT = NULL;
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'age' => 'required'
    );
}
