<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;

class CalendarController extends Controller
{
    public function index(){
        return view('calendar');
    }
    
    
    
 }
