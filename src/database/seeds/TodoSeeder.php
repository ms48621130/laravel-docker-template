<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() // run()メソッド内にテストデータの実装処理を連想配列で記述
    {
        DB::table('todos')->truncate(); // truncateメソッドで該当のテーブルのレコードをすべて削除するTRUNCATE文を実行
        // 開発者間のテストデータに差異が生じないよう、元々テーブルに存在していたデータを削除後、テストデータを投入する必要があるため

    $testData = [
        [
            'content' => 'PHP Appセクションを終える',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'content' => 'Laravel Lessonを終える',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ];

    DB::table('todos')->insert($testData); // insertメソッドで引数の$testDataをtodosテーブルに投入するINSERT文を実行
    }
}

// マイグレーションファイルはテーブルの作成を担い、Seederファイルはレコード(テストデータ)の作成を担う役割を持つ。
// ①どちらも各ファイルをGitで共有することで、開発者全員が現在のデータベースの状態を共有したり同じ構成のテーブルを作成したりすることができる。
// ②SQLを知らなくても、PHPコードでテーブル操作やレコード操作ができる。(学習コストが不要)