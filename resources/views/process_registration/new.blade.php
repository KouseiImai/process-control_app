@extends('layouts.base')

@section('header_title', '工程登録')

@section('content')
  <div class="form_main">
    <div class="input_contents">
      <h1 class="input_index">登録項目<h1>
      @if ( count($errors) > 0 )
        <div class="error_message">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="POST" action="/process/create">
        @csrf
        <div class="form_contents">
          <label class="label_name">アイテム名 <div class="required_item">必須項目</div></label>
          <input type="text" name="item_name" class="input_form">
          <label class="label_name">Lot_No <div class="required_item">必須項目</div></label>
          <input type="text" name="lot_number" class="input_form">
          <label class="label_name">着手予定日時 <div class="required_item">必須項目</div></label>
          <input type="date" name="start_date" value="YYYY-MM-DD" min=
            <?php
              echo date('Y-m-d');
            ?>
          >
          <div class="time_form">
            <select class="hour_select_form" name="start_hour">
              <option value="">--</option>
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="start_minutes">
              <option value="">--</option>
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">完了予定日時 <div class="required_item">必須項目</div></label>
          <input type="date" name="end_date" value="YYYY-MM-DD" min=
            <?php
              echo date('Y-m-d');
            ?>
          >
          <div class="time_form">
            <select class="hour_select_form" name="end_hour">
              <option value="">--</option>
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="end_minutes">
              <option value="">--</option>
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
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