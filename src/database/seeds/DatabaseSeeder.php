<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() //php artisan db:seedコマンドでcallメソッド内のSeederクラスを実行することで、Seederファイルが実行される
    {
        $this->call([
            TodoSeeder::class,
        ]);
    }
}
