<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo; // TodoControllerのクラスプロパティを表す
    public function __construct(Todo $todo) // Todoクラスのインスタンス化と$todoへの代入を同時にしている。コンストラクトインジェクションと呼ぶ。
    {
        $this->todo = $todo; // コンストラクタインジェクションで生成したTodoインスタンスをクラスプロパティに代入している。
    }
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        // $todosの返り値はcollectionインスタンス。Collectionクラスを使うメリットは、データ操作のための便利なメソッドが数多く存在し、
        // コードが簡潔で可読性が上がることがメリットとして挙げられる。
        // $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request) // storeメソッドを呼び出し、Requestクラスのインスタンス化と$requestへの代入を同時にしている。メソッドインジェクションと呼ぶ。
    // RequestクラスはHTTPリクエスト処理をシンプルに操作できるクラス。$requestにはフォームから送信された値が格納されている。
    {
        // dd($request);
        $inputs = $request->all(); //$inputsは連想配列
        // dd($inputs);
        $todo = new Todo();
        // dd($todo);
        $todo->fill($inputs)->save();
        // $this->todo->fill($inputs)>save();
        // ->fill()は$todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して行う。
        return redirect()->route('todo.index');
    }
    
    public function show($id) // showメソッドの引数にルートパラメータを受け取ることができる。$idという変数で受け取る。
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
    
    public function edit($id) // editメソッドの引数にルートパラメータを受け取ることができる。$idという変数で受け取る。
    {
        $todo = $this->todo->find($id);
        // dd($todo);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        $todo = $this->todo->find($id);
        // dd($todo);
        $todo->fill($inputs)->save();
        // dd($todo);
        return redirect()->route('todo.show', $todo->id);
    }
}
