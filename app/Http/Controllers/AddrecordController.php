<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
class AddrecordController extends Controller
{
     
    public function recordInsert(Request $request)
    
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
    $event = new Event;
    $uid = \Auth::id();
    $id = sha1(uniqid(mt_rand(), true));
    
    //$event->created_user_id = $request->created_user_id;
    $event->title = $request->title;
    $event->start_date = $request->start_date;
    $event->end_date = $request->end_date;
    $event->start_time = $request->start_time;
    $event->end_time = $request->end_time;
    $event->calendar_color = $request->calendar_color;
    $event -> created_user_id = $uid;
    $event -> id = $id;
    $event->save();
    // リロード等による二重送信防止
    $request->session()->regenerateToken();
   
 
       
     } 
    } 
    //

