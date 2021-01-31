@extends('layouts.base')

@section('header_title', '日報入力')

@section('content')
<div class="form_main">
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
      <form method="POST" action="/report/create">
        @csrf
        <div class="form_contents">
          <label class="label_name">アイテム名 <div class="required_item">必須項目</div></label>
          <select class="select_form" name="item_name">
            <option value="">--</option>
            @foreach($item_names as $item_name)
              <option value="{{ $item_name->item_name }}">{{ $item_name->item_name }}</option>
            @endforeach
          </select>
          <label class="label_name">Lot_No <div class="required_item">必須項目</div></label>
          <select class="select_form" name="lot_number">
            <option value="">--</option>
            @foreach($lot_numbers as $lot_number)
              <option value="{{ $lot_number->lot_number }}">{{ $lot_number->lot_number }}</option>
            @endforeach
          </select>
          <label class="label_name">生産枚数 <div class="required_item">必須項目</div></label>
          <div class="input_num_form">
            <input type="text" name="production_num" class="num_form"><div class="num_text">枚</div>
          </div>
          <label class="label_name">生産完了時間<div class="required_item">必須項目</div>(※生産が終わった時刻を入力して下さい)</label>
          <div class="time_form">
            <select class="hour_select_form" name="done_hour">
              <option value="">--</option>
              @foreach(range(0,23) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時</div>
            <select class="minutes_select_form" name="done_minutes">
              <option value="">--</option>
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">故障時間 (※トータルの時間を入力して下さい)</label>
          <div class="time_form">
            <select class="hour_select_form" name="accident_hour">
              <option value="">--</option>
              @foreach(range(0,99) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時間</div>
            <select class="minutes_select_form" name="accident_minutes">
              <option value="">--</option>
              <option value="0">0</option>
              <option value="30">30</option>
            </select>
            <div class="minutes_text">分</div>
          </div>
          <label class="label_name">待ち時間 (※トータルの時間を入力して下さい)</label>
          <div class="time_form">
            <select class="hour_select_form" name="wait_hour">
              <option value="">--</option>
              @foreach(range(0,99) as $h)
                <option value="{{ $h }}">{{ $h }}</option>
              @endforeach
            </select>
            <div class="hour_text">時間</div>
            <select class="minutes_select_form" name="wait_minutes">
              <option value="">--</option>
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