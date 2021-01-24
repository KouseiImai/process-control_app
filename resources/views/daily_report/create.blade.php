@extends('layouts.base')

@section('header_title', '日報入力完了')

@section('content')
  <div class="create_main">
    <div class="create_contents">
      <p class="done_message">日報の登録が完了しました</p>
      <a href="/report/new" class="text_btn">日報入力画面へ戻る</a>
      <a href="/" class="text_btn">ホーム画面へ移動</a>
    </div>
  </div>
@endsection