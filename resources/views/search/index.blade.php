@extends('layouts.base')

@section('header_title', 'データ検索')

@section('content')
  <div class="form_main">
    <div class="input_contents">
      <h1 class="input_index">検索項目</h1>
      @if ( count($errors) > 0 )
        <div class="error_message">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form method="POST" action="/search/data_search">
        @csrf
        <div class="form_contents">
          <label class="label_name">アイテム名</label>
          <select class="select_form" name="item">
            <option value="">--</option>
            @foreach($item_names as $item_name)
              <option value="{{ $item_name->item_name }}">{{ $item_name->item_name }}</option>
            @endforeach
          </select>
          <label class="label_name">Lot_No</label>
          <select class="select_form" name="lot_number">
            <option value="">--</option>
            @foreach($lot_numbers as $lot_number)
              <option value="{{ $lot_number->lot_number }}">{{ $lot_number->lot_number }}</option>
            @endforeach
          </select>
          <label class="label_name">期間</label>
          <div class="date_contents">
            <input type="date" name="start_date" value="YYYY-MM-DD">
            <div class="tilde">~</div>
            <input type="date" name="end_date" value="YYYY-MM-DD">
          </div>
          <div class="btn_contest">
            <input type="submit" value="検索" class="btn">
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection