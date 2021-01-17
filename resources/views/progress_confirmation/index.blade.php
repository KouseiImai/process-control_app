@extends('layouts.base')

@section('header_title', '進捗確認表')

@section('content')
  <div class="progress_main">
    <table>
      <tr class="underline"><th class="progress_th">進捗</th><th class="item_th">アイテム名</th><th class="lotnumber_th">ロットナンバー</th><th class="date_th">日付</th><th class="blank_th"></th>
        @foreach(range(0,23) as $hour)
          <th class="hour_th">{{ $hour }}:00</th>
        @endforeach
      </tr>
      @foreach ( $datum as $data )
        <tr>
          @if ( $data->start_date == $data->end_date )
            <td rowspan="2" class="progress_td underline">{{ floor((($now_time - $data->start_hour) / ( $data->end_hour - $data->start_hour )) * 100) }}%</td>
          @else
            <td rowspan="2" class="progress_td underline">{{ floor((($now_time - $data->start_hour) / ( 24 - $data->start_hour + $data->end_hour )) * 100) }}%</td>
          @endif
          @foreach ( $data->production_items as $item )
            <td rowspan="2" class="item_td underline">{{ $item->item_name }}</td>
          @endforeach
          @foreach ( $data->lot_numbers as $lot_number )
            <td rowspan="2" class="lotnumber_td underline">{{ $lot_number->lot_number }}</td>
          @endforeach
          <td rowspan="2" class="date_td underline">
            着手日：{{ $data->start_date }}
          </td>
          <td class="schedule_td">計画</td>
          <div>
            @if ( $data->start_date == $data->end_date )
              @if ( $data->start_hour == 0 )
                @foreach(range(0,$data->end_hour - 1) as $hour)
                  <td class="plans_td"><div class="plans"></div></td>
                @endforeach
                @foreach(range($data->end_hour,23) as $hour)
                  <td class="blank_td"></td>
                @endforeach
              @elseif ( $data->start_hour == 23 )
                @foreach(range(0,22) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                <td class="plans_td"><div class="plans"></div></td>
              @else
                @foreach(range(1,$data->start_hour) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @foreach(range($data->start_hour,$data->end_hour - 1) as $hour)
                  <td class="plans_td"><div class="plans"></div></td>
                @endforeach
                @foreach(range($data->end_hour,23) as $hour)
                  <td class="blank_td"></td>
                @endforeach
              @endif
            @else
              @if ( $data->start_hour == 0 )
                @foreach(range(0,23) as $hour)
                  <td class="plans_td"><div class="plans"></div></td>
                @endforeach
              @elseif ( $data->start_hour == 23 )
                @foreach(range(0,22) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                <td class="plans_td"><div class="plans"></div></td>
              @else
                @foreach(range(1,$data->start_hour) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @foreach(range($data->start_hour,23) as $hour)
                  <td class="plans_td"><div class="plans"></div></td>
                @endforeach
              @endif
            @endif
          </div>
        </tr>
        <tr class="underline">
          <td class="existent_td">現在</td>
          @if ( $data->start_hour == 0 )
            @foreach(range( $data->start_hour,$now_time - 1 ) as $hour)
              <td class="current_td"><div class="current"></div></td>
            @endforeach
            @foreach(range( $now_time - 1, 22 ) as $hour)
              <td class="current_td"></td>
            @endforeach
          @else
            @foreach(range( 0, $data->start_hour - 1 ) as $hour)
              <td class="current_td"></td>
            @endforeach
            @foreach(range( $data->start_hour,$now_time - 1 ) as $hour)
              <td class="current_td"><div class="current"></div></td>
            @endforeach
            @foreach(range( $now_time - 1, 22 ) as $hour)
              <td class="current_td"></td>
            @endforeach
          @endif
        </tr>
      @endforeach
    </table>
  </div>
@endsection