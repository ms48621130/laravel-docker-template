@extends('layouts.base')
<!-- extendsディレクティブは、引数のlayouts.baseを、継承する親bladeに指定している。引数はresources/views/以降のパスを.区切りで指定し、拡張子は省略できる。 -->
@section('content')
<!-- sectionディレクティブは、 endsectionディレクティブまで囲まれた部分を、親bladeのyieldディレクティブに挿入している。
引数に同じ文字列を指定することでsectionディレクティブとyieldディレクティブを紐づけている
@はディレクティブと呼ばれ一般的なPHPの制御構文の便利な短縮記述方法を提供してくれる -->
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ToDo作成</div>
        <div class="card-body">
          <form method="post" action="{{ route('todo.store') }}">
            <!-- formタグにaction属性="todo.store"、method属性="post"と記述している。
            httpメソッドのpostを使用して入力したデータをaction属性で指定したurlパス(todo.store)に送信する -->
            @csrf
            <!-- Laravelではフォーム内に@csrfを追記するだけでトークンの生成と検証を自動的に行ってくれる。
            新規作成画面でデベロッパーツールを使用して、@csrfが挿入されている箇所を確認すると
            CSRF対策のためのトークンが含まれたinputタグが生成されているのを確認できる。 -->
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">ToDo入力</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="content" value="">
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">作成</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection