<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Categorie;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $datas = ['HTML', 'JS', 'MYSQL','GULP'];

		foreach ($datas as $data) {
			$categorie = new Categorie();
			$categorie->name = $data;
			$categorie->slug = Str::slug($categorie->name , '-');
			$categorie->save();
		}

    }
}
