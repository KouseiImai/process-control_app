@extends('layouts.base')

@section('content')
  <div class="new_main">
    <div class="input_contents">
      <h1 class="input_index">登録項目<h1>
      <form method="POST" action="/process/create">
        @csrf
        <div class="form_contents">
          <label class="label_name">アイテム名</label>
          <input type="text" name="item_name" class="input_form">
          <label class="label_name">Lot_No</label>
          <input type="text" name="lot_number" class="input_form">
          <label class="label_name">着手予定日時</label>
          <input type="date" name="start_date" value="YYYY-MM-DD" min=
            <?php
              echo date('Y-m-d');
            ?>
          >
          <select class="select_form">
            @foreach($times as $time)
              <option value="{{ $time }}">{{ $time }}</option>
            @endforeach
          </select>
          <label class="label_name">完了予定日時</label>
          <input type="date" name="end_date" value="YYYY-MM-DD" min=
            <?php
              echo date('Y-m-d');
            ?>
          >
          <select class="select_form">
            @foreach($times as $time)
              <option value="{{ $time }}">{{ $time }}</option>
            @endforeach
          </select>
          <label class="label_name">備考欄</label>
          <textarea name="process_remarks" class="remarks"></textarea>
          <div class="btn_contest">
            <input type="submit" value="登録" class="btn">
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection