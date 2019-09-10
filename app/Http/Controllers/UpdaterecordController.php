<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

use Auth;

use Illuminate\Support\Facades\DB;

class UpdaterecordController extends Controller
{


public function recordUpdate(Request $request)
{
    function myhtmlspecialchars($request) {
    if (is_array($request)) {
        return array_map("myhtmlspecialchars", $request);
    } else {
        return htmlspecialchars($request, ENT_QUOTES);
    }
}
    myhtmlspecialchars($request);
     // データベース登録
    $uid = \Auth::id();
    $event = [
   
    
    'created_user_id' => $uid,
    'title' => $request->title,
    'start_date' => $request->start_date,
    'end_date' => $request->end_date,
    'start_time'=> $request->start_time,
    'end_time'=> $request->end_time,
   'calendar_color'=> $request->calendar_color
    ];
   DB::table('events')
            ->where('id',$request->id)
           ->update($event);
    
   
    //

}
}
