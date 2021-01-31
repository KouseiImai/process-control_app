@extends('layouts.base')

@section('header_title', '検索結果')

@section('content')
  <div class="result_main">
    <table>
      <tr ><th class="search_page_th">アイテム名</th><th class="search_page_th">ロットナンバー</th><th class="search_page_th">着手日</th><th class="search_page_th">完了日</th><th class="search_page_th">生産枚数</th><th class="search_page_th">トータル時間</th><th class="search_page_th">生産時間</th><th class="search_page_th">故障時間</th><th class="search_page_th">待ち時間</th></tr>
      @foreach ( $datum as $data )
        <tr>
          @foreach ( $data->production_items as $item )
            <td class="search_page_td underline">{{ $item->item_name }}</td>
          @endforeach
          @foreach ( $data->lot_numbers as $lot_number )
            <td class="search_page_td underline">{{ $lot_number->lot_number }}</td>
          @endforeach
          <td class="search_page_td underline">
            着手日：{{ $data->start_date }}
          </td>
          <td class="search_page_td underline">
            完了日：{{ $data->done_date }}
          </td>
          <!-- 生産枚数 -->
          <td class="search_page_td underline">
            {{ $data->production_num }}枚
          </td>
          <!-- トータル時間 -->
          <td class="search_page_td underline">
            @if( $data->total_minutes == 0 )
              {{ $data->total_hour }}時間
            @else
              {{ $data->total_hour }}時間 {{ $data->total_minutes }}分
            @endif
          </td>
          <!-- 生産時間 -->
          <td class="search_page_td underline">
            @if( $data->accident_minutes == 30 && $data->wait_minutes == 30 )
              @if( $data->total_minutes == 30 )
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) - 1 }}時間 30分
              @else
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) - 1 }}時間
              @endif
            @elseif( $data->accident_minutes == 30 || $data->wait_minutes == 30 )
              @if( $data->total_minutes == 30 )
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) - 1 }}時間
              @else
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) -1 }}時間 30分
              @endif
            @else
              @if( $data->total_minutes == 30 )
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) }}時間 30分
              @else
                {{ ($data->total_hour) - ($data->accident_hour + $data->wait_hour) }}時間
              @endif
            @endif
          </td>
          <!-- 故障時間 -->
          @if( is_null($data->accident_hour) )
            <td class="search_page_td underline">---</td>
          @else
            @if( $data->accident_minutes != null )
              <td class="search_page_td underline">{{ $data->accident_hour }}時間{{ $data->accident_minutes }}分</td>
            @else
              <td class="search_page_td underline">{{ $data->accident_hour }}時間</td>
            @endif
          @endif
          <!-- 待ち時間 -->
          @if( is_null($data->wait_hour) )
            <td class="search_page_td underline">---</td>
          @else
            @if( $data->wait_minutes != null )
              <td class="search_page_td underline">{{ $data->wait_hour }}時間{{ $data->wait_minutes }}分</td>
            @else
              <td class="search_page_td underline">{{ $data->wait_hour }}時間</td>
            @endif
          @endif
        </tr>
      @endforeach
    </table>
  </div>
@endsection