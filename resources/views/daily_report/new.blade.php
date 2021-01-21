@extends('layouts.base')

@section('header_title', '日報入力')

@section('content')
<div class="new_main">
    <div class="input_contents">
      <h1 class="input_index">日報入力項目<h1>
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
          <label class="label_name">生産枚数 <div class="required_item">必須項目</div></label>
          <input type="text" name="production_num" class="num_form"><div class="num_text">枚</div>
          <label class="label_name">生産完了時間 <div class="required_item">必須項目</div></label>
          <div class="time_form">
            <select class="hour_select_form" name="done_hour">
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="done_minutes">
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">故障時間</label>
          <div class="time_form">
            <select class="hour_select_form" name="accident_hour">
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="accident_minutes">
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">前工程待ち時間</label>
          <div class="time_form">
            <select class="hour_select_form" name="pre_process_hour">
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="pre_process_minutes">
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">備考欄</label>
          <textarea name="report_remarks" class="remarks"></textarea>
          <div class="btn_contest">
            <input type="submit" value="登録" class="btn">
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection