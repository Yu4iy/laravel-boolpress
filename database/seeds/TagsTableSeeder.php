<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$datas = ['Front', 'Back', 'UI','Design'];

		foreach ($datas as $data) {
			$tag = new Tag();

			$tag->name = $data;
			$tag->slug = Str::slug($tag->name , '-');

		
			$tag->save();
		}
    }
}
