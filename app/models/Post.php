<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'posts';

    protected $dates = ['deleted_at'];

    protected $guarded = ['*'];

}