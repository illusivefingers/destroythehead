<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoriesTags extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('post');
            $table->text('description');
            $table->text('slug');
			$table->unsignedInteger('category_id');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name')->unique();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name')->unique();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('post_tag', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
		Schema::drop('categories');
		Schema::drop('tags');
		Schema::drop('post_tag');
	}

}
