<?php

use Faker\Factory as Faker;

class RandomPostSeeder extends Seeder
{
	const MAX_POSTS = 40;

    const MAX_CATEGORIES = 5;

	/**
	 * Instance of Faker available to seeder
	 *
	 * @var Faker
	 */
	private $faker;

	private $tables = [
		'posts'
	];

	public function __construct()
	{
		$this->faker = Faker::create();
	}

	public function run()
	{
		$this->cleanTables();
		$this->createCategories();
		$this->createPosts();
	}

	private function cleanTables()
	{
		//DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
		foreach ($this->tables as $tableName)
		{
			DB::table($tableName)->truncate();
		}
		//DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
	}

	private function createCategories()
	{
		foreach (range(1, self::MAX_CATEGORIES) as $index)
		{
            Category::create([
                'name'      => ucfirst($this->faker->domainName())
            ]);
		}
	}

	private function createPosts()
	{
        $postIds = Category::lists('id');
		foreach (range(1, self::MAX_POSTS) as $index)
		{
			$created_at = $this->faker->dateTimeBetween('-1 years', 'now');
			$updated_at = $this->faker->dateTimeBetween($created_at, 'now');
			Post::create([
				'post'          => $this->faker->text(2000),
				'description'   => $this->faker->text(200),
				'category_id'   => $this->faker->randomElement($postIds),
                'slug'          => $this->faker->slug(),
                'created_at'    => $created_at,
				'updated_at'    => $updated_at
			]);
		}
	}
}