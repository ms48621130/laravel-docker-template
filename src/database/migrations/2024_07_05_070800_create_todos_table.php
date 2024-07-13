<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //データベースに新しいテーブルやカラムなどを生成するための処理。php artisan migrateコマンドでup()を実行。
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // upメソッドによって実行する操作と逆の操作を実装し、以前の状態へ戻すための処理。php artisan migrate:rollbackコマンドでdown()を実行。
    {
        Schema::dropIfExists('todos');
    }
}

// マイグレーションファイルはテーブルの作成を担い、Seederファイルはレコード(テストデータ)の作成を担う役割を持つ。
// ①どちらも各ファイルをGitで共有することで、開発者全員が現在のデータベースの状態を共有したり同じ構成のテーブルを作成したりすることができる。
// ②SQLを知らなくても、PHPコードでテーブル操作やレコード操作ができる。(学習コストが不要)