<?php

use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Tag extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'tag';

    protected $dates = ['deleted_at'];

    protected $guarded = ['*'];

}