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
            @if ( $data->start_hour == $data->end_hour )
              <td rowspan="2" class="progress_td underline">--</td>
            @else
              <td rowspan="2" class="progress_td underline">{{ floor((($now_time - $data->start_hour) / ( $data->end_hour - $data->start_hour )) * 100) }}%</td>
            @endif
          @else
            @if ( $data->start_hour == $data->end_hour )
              <td rowspan="2" class="progress_td underline">--</td>
            @else
              <td rowspan="2" class="progress_td underline">{{ floor((($now_time - $data->start_hour) / ( 24 - $data->start_hour + $data->end_hour )) * 100) }}%</td>
            @endif
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
              <!-- 着手日と完了予定日が同日 -->
              @if ( $data->start_hour == 0 )
                <!-- 着手日と完了予定日が同日で着手時間が0時 -->
                @if ( $data->start_minutes == 30 )
                  <!-- 着手日と完了予定日が同日で着手時間が0時で分単位が30分 -->
                  @foreach(range(0,0) as $hour)
                    <td class="plans_td"><div class="plans_start_half"></div></td>
                  @endforeach
                  @if ( $data->end_minutes == 30 )
                    <!-- 着手時間が0時の分単位が30分でかつ完了予定時間の分単位が30分 -->
                    @foreach(range(1,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour,$data->end_hour) as $hour)
                    <td class="plans_td"><div class="plans_end_half"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour - 1 , 22) as $hour)
                      <td class="blank_td"></td>
                    @endforeach
                  @else
                    <!-- 着手時間が0時の分単位が30分でかつ完了予定時間の分単位が0分 -->
                    @foreach(range(1,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour, 22) as $hour)
                      <td class="blank_td"></td>
                    @endforeach
                  @endif
                @else
                  @if ( $data->end_minutes == 30 )
                    <!-- 着手時間が0時の分単位が0分でかつ完了予定時間の分単位が30分 -->
                    @foreach(range(0,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour,$data->end_hour) as $hour)
                    <td class="plans_td"><div class="plans_end_half"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour - 1, 23) as $hour)
                      <td class="blank_td"></td>
                    @endforeach
                  @else
                    <!-- 着手時間が0時の分単位が0分でかつ完了予定時間の分単位が0分 -->
                    @foreach(range(1,$data->end_hour) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour,22) as $hour)
                      <td class="blank_td"></td>
                    @endforeach
                  @endif
                @endif
              @elseif ( $data->start_hour == 23 )
                <!-- 着手日と完了予定日が同日で着手時間が23時 -->
                @foreach(range(0,22) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @if ( $data->start_minutes == 30 )
                  <!-- 着手時間が23時で完了予定時間の分単位が0分 -->
                  <td class="plans_td"><div class="plans_start_half"></div></td>
                @elseif ( $data->end_minutes == 30 )
                  <!-- 着手時間が23時で完了予定時間の分単位が30分 -->
                  <td class="plans_td"><div class="plans_end_half"></div></td>
                @else
                  <!-- 着手時間が23時で完了予定時間が24時 -->
                  <td class="plans_td"><div class="plans"></div></td>
                @endif
              @else
                <!-- 着手日と完了予定日が同日で着手時間が1時以降 -->
                @foreach(range(1,$data->start_hour) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @if ( $data->start_minutes == 30 )
                  <!-- 着手時間が1時以降で着手時間の分単位が30分 -->
                  @if ( $data->end_minutes == 30 )
                    <!-- 着手時間が1時以降で着手開始の分単位が30分で完了予定時間の分単位が30分 -->
                    @foreach(range($data->start_hour,$data->start_hour) as $hour)
                      <td class="plans_td"><div class="plans_start_half"></div></td>
                    @endforeach
                    @foreach(range($data->start_hour + 1,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour,$data->end_hour) as $hour)
                      <td class="plans_td"><div class="plans_end_half"></div></td>
                    @endforeach
                  @else
                    <!-- 着手時間が1時以降で着手開始の分単位が30分で完了予定時間の分単位が0分 -->
                    @foreach(range($data->start_hour,$data->start_hour) as $hour)
                      <td class="plans_td"><div class="plans_start_half"></div></td>
                    @endforeach
                    @foreach(range($data->start_hour + 1,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                  @endif
                  @foreach(range($data->end_hour,22) as $hour)
                    <td class="blank_td"></td>
                  @endforeach
                @else
                  <!-- 着手日と完了予定日が同日で着手時間が1時以降 -->
                  @if ( $data->end_minutes == 30 )
                    <!-- 着手時間が1時以降で着手開始の分単位が0分で完了予定時間の分単位が30分 -->
                    @foreach(range($data->start_hour,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                    @foreach(range($data->end_hour,$data->end_hour) as $hour)
                      <td class="plans_td"><div class="plans_end_half"></div></td>
                    @endforeach
                  @else
                    <!-- 着手時間が1時以降で着手開始の分単位が0分で完了予定時間の分単位が0分 -->
                    @foreach(range($data->start_hour,$data->end_hour - 1) as $hour)
                      <td class="plans_td"><div class="plans"></div></td>
                    @endforeach
                  @endif
                  @foreach(range($data->end_hour,22) as $hour)
                    <td class="blank_td"></td>
                  @endforeach
                @endif
              @endif
            @else
              <!-- 着手日より完了予定日が後 -->
              @if ( $data->start_hour == 0 )
                <!-- 着手日より完了予定日が後で着手開始時間が0時 -->
                @if ( $data->start_minutes == 30 )
                  <!-- 着手開始時間の分単位が30分 -->
                  @foreach(range(0,0) as $hour)
                    <td class="plans_td"><div class="plans_start_half"></div></td>
                  @endforeach
                  @foreach(range(1,23) as $hour)
                    <td class="plans_td"><div class="plans"></div></td>
                  @endforeach
                @else
                  <!-- 着手開始時間の分単位が0分 -->
                  @foreach(range(0,23) as $hour)
                    <td class="plans_td"><div class="plans"></div></td>
                  @endforeach
                @endif
              @elseif ( $data->start_hour == 23 )
                <!-- 着手日より完了予定日が後で着手開始時間が23時 -->
                @foreach(range(0,22) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @if ( $data->start_minutes == 30 )
                  <!-- 着手開始時間の分単位が30分 -->
                  <td class="plans_td"><div class="plans_start_half"></div></td>
                @else
                  <!-- 着手開始時間の分単位が0分 -->
                  <td class="plans_td"><div class="plans"></div></td>
                @endif
              @else
                <!-- 着手日より完了予定日が後で着手開始時間が1時以降 -->
                @foreach(range(1,$data->start_hour) as $hour)
                  <td class="blank_td"></td>
                @endforeach
                @if ( $data->start_minutes == 30 )
                  <!-- 着手日より完了予定日が後で着手開始時間が1時以降で着手予定時間の分単位が30分 -->
                  @foreach(range($data->start_hour,$data->start_hour) as $hour)
                    <td class="plans_td"><div class="plans_start_half"></div></td>
                  @endforeach
                  @foreach(range($data->start_hour + 1,23) as $hour)
                    <td class="plans_td"><div class="plans"></div></td>
                  @endforeach
                @else
                  <!-- 着手日より完了予定日が後で着手開始時間が1時以降で着手予定時間の分単位が0分 -->
                  @foreach(range($data->start_hour,23) as $hour)
                    <td class="plans_td"><div class="plans"></div></td>
                  @endforeach
                @endif
              @endif
            @endif
          </div>
        </tr>
        <tr class="underline">
          <td class="existent_td">現在</td>
          @if ( $data->start_hour <= $now_time )
            @if ( $data->start_hour == 0 )
              <!-- 着手時間が0時の場合 -->
              @if ( $data->start_minutes == 30 )
                <!-- 着手時間の分単位が30分 -->
                @foreach(range( $data->start_hour,$data->start_hour ) as $hour)
                  <td class="current_td"><div class="current_half"></div></td>
                @endforeach
                @foreach(range( $data->start_hour - 1,$now_time - 1 ) as $hour)
                  <td class="current_td"><div class="current"></div></td>
                @endforeach
              @else
                <!-- 着手時間の分単位が0分 -->
                @foreach(range( $data->start_hour,$now_time - 1 ) as $hour)
                  <td class="current_td"><div class="current"></div></td>
                @endforeach
              @endif
                @foreach(range( $now_time - 1, 22 ) as $hour)
                  <td class="current_td"></td>
                @endforeach
            @else
              <!-- 着手時間が1時以降の場合 -->
              @foreach(range( 0, $data->start_hour - 1 ) as $hour)
                <td class="current_td"></td>
              @endforeach
              @if ( $data->start_minutes == 30 )
                <!-- 着手時間の分単位が30分 -->
                @foreach(range( $data->start_hour,$data->start_hour ) as $hour)
                  <td class="current_td"><div class="current_half"></div></td>
                @endforeach
                @foreach(range( $data->start_hour - 1,$now_time - 1 ) as $hour)
                  <td class="current_td"><div class="current"></div></td>
                @endforeach
              @else
                <!-- 着手時間の分単位が0分 -->
                @foreach(range( $data->start_hour,$now_time - 1 ) as $hour)
                  <td class="current_td"><div class="current"></div></td>
                @endforeach
              @endif
              @foreach(range( $now_time - 1, 22 ) as $hour)
                <td class="current_td"></td>
              @endforeach
            @endif
          @else
            @foreach(range( 0, 23 ) as $hour)
              <td class="current_td"></td>
            @endforeach
          @endif
        </tr>
      @endforeach
    </table>
  </div>
@endsection