@extends('layouts.base')
<!-- extendsディレクティブは、引数のlayouts.baseを、継承する親bladeに指定している。引数はresources/views/以降のパスを.区切りで指定し、拡張子は省略できる。 -->
@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
    <p class="text-left">
      <a class="btn btn-success" href="{{ route('todo.create') }}">ToDoを追加</a>
      
    </p>
      <div class="card">
        <div class="card-header">
          ToDo一覧
        </div>
        <div class="list-group list-group-flush">
          @foreach ($todos as $todo)
          <!-- foreachを使って$todosを1レコードずつ$todoとして取り出している。 -->
            <div class="d-flex align-items-center p-2">
              <span class="col-9">{{ $todo->content }}</span>
              <!-- todosテーブルのレコードのcontentカラムを取得している -->
              <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-info ml-3">詳細</a>
              <!-- 第一引数に遷移先のURLを指定し、第二引数にルートパラメータを指定している -->
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
      