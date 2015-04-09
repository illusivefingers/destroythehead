<?php
use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent
{
    use SoftDeletingTrait;

    protected $table = 'categories';

    protected $dates = ['deleted_at'];

    protected $guarded = ['*'];

}