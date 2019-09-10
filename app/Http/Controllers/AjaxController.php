<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use Auth;




class AjaxController extends Controller
{

     
    public function getScheduleList()
    {
        
       
        $id = \Auth::id();
       // スケジュールデータを取得
    $scheduleData = DB::select('select * from events where created_user_id = ?',[$id]);
    
    
    // 取得データを整形して配列に再セット
    $scheduleList = [];
    
    foreach ($scheduleData as $schedule) {
      $scheduleList[] = [
          'id' => $schedule->id,
          'title' => $schedule->title,
          'description' => $schedule->description,
          'start' => $schedule->start_date.(!empty($schedule->start_time) ? " ".$schedule->start_time : " 00:00"),
          'end' => $schedule->end_date.(!empty($schedule->end_time) ? " ".$schedule->end_time : " 23:59"),
          'color' => $schedule->calendar_color,
          'textColor' => $schedule->calendar_text_color
      ];
    }
    
    // 処理結果をJSON形式で返す
     echo json_encode($scheduleList);
    }
    
    
 }
