<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'USER_USERNAME', 'USER_POST_ID', 'STATUS_TEXT', 'STATUS_TITLE', 'IMAGE_NAME', 'IMAGE_PATH',
];


}
