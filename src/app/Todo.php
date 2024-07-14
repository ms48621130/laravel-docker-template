<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model // Todoクラスを定義
{
    use SoftDeletes;
    protected $table = 'todos'; // app配下に作成されたTodoModelをデータベースのtodosテーブルとマッピングする。
    // 画面の入力項目が増減しても常に同じコードで登録処理が実現できるようになり保守性と可読性が向上する
    protected $fillable = [
        'content',
    ];
}
