<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() // indexメソッドを呼び出す
    {
        $todo = new Todo(); // todosテーブルを操作するためにTodoクラスをインスタンス化し、$todoに代入している
        $todos = $todo->all(); // $todoのallメソッドを返した実行結果を$todosに代入している。これはtodosテーブルのレコードを全件取得している。
        // $todosの返り値はcollectionインスタンス。Collectionクラスを使うメリットは、データ操作のための便利なメソッドが数多く存在し、
        // コードが簡潔で可読性が上がることがメリットとして挙げられる。
        return view('todo.index', ['todos' => $todos]); // view関数を使用して、第一引数には画面に表示したいbladeファイルを指定し、
        // 第二引数のキー部分にblade内の変数名であるtodosを指定し、バリュー部分に代入したい値である$todosを指定した実行結果をreturnで返している
    }

    public function create() // createメソッドを呼び出す
    {
        return view('todo.create'); // view関数を使用して、引数に画面に表示したいbladeファイルを指定した実行結果をreturnで返している
    }

    public function store(Request $request) // storeメソッドを呼び出し、Requestクラスのインスタンス化と$requestへの代入を同時にしている。メソッドインジェクションと呼ぶ。
    // RequestクラスはHTTPリクエスト処理をシンプルに操作できるクラス。
    {
        // dd($request);
        $inputs = $request->all(); // $requestのallメソッドを返した実行結果を$inputsに代入している。
        // Requestインスタンスのallメソッドを使用してフォームから送信された値を個別ではなく一括で取得できる。$inputsは連想配列
        // dd($inputs);
        $todo = new Todo(); // todosテーブルを操作するためにTodoクラスをインスタンス化し、$todoに代入している
        // dd($todo);
        $todo->fill($inputs); // fillメソッドを使って$inputsに格納されている連想配列を$todoに代入
        // ->fill()は$todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して行う。
        // dd($todo);
        $todo->save(); // TodoインスタンスをDBに保存するINSERT文を実行
        return redirect()->route('todo.index'); // ToDoが新規作成された後に、一覧画面にリダイレクトする
    }
    
    public function show($id) // showメソッドの引数にルートパラメータを受け取ることができる。$idという変数で受け取る。
    {
        $model = new Todo(); // todosテーブルを操作するためにTodoクラスをインスタンス化し、$modelに代入している
        $todo = $model->find($id); // $modelのfindメソッドの$idを引数に返した実行結果を$todoに代入している
        return view('todo.show', ['todo' => $todo]); // view関数を使用して、第一引数には画面に表示したいbladeファイルを指定し、
        // 第二引数のキー部分にblade内の変数名であるtodosを指定し、バリュー部分に代入したい値である$todosを指定した実行結果をreturnで返している
    }
    
}
