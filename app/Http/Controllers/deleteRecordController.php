<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

use Illuminate\Support\Facades\DB;

class deleteRecordController extends Controller
{
    public function recorddelete(Request $request)
{
    
     // データベース登録
    $event = ['id' => $request->id];
   DB::table('events')
            ->where('id',$request->id)
           ->delete($event);
    
   
    //

}
}
