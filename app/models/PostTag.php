<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;

class PostTag extends Eloquent
{
    protected $table = 'post_tag';

    protected $dates = ['deleted_at'];

    protected $guarded = ['*'];

}