<?php

class PostsController extends BaseController
{
    public function indexAction()
    {

    }

    public function showAction($slug)
    {
        //TODO: implement not found solution
        $post = Post::where('slug', '=', $slug)->first();

        return View::make('post', ['post' => $post]);
    }
}