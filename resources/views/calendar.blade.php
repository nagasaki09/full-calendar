<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>カレンダー</title>
<script src="/js/jquery.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/popper.js"></script>
<!-- BootstrapのJS読み込み -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/css/fullcalendar.min.css" />
<link rel="stylesheet" media='print' href="/css/fullcalendar.print.min.css"/>
<!-- BootstrapのCSS読み込み -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script src="/js/fullcalendar.min.js"></script> 
<script src="/js/ja.js"></script>
<script src="/js/events_control.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

 <?php
 $uid = \Auth::id();

 ?> 
<script>
    
      

     

    $(document).ready(function() {
        
        
        

            $('#calendar').fullCalendar({
                    header:{
                        left:'prev,next,today',
                        center:'title,eventListButton',
                        right:'month agendaWeek agendaDay'
                    },
                    buttonText:'week',
                    editable: true, //イベントを編集するか
                    allDaySlot: true, //終日表示の枠を表示するか
                    eventDurationEditable: true, //イベント期間をドラッグして変更するかどうか
                    selectable: true,
                    selectHelper: true,
                    droppable: true,//イベントをドラッグできるかどうか
                    
                  
                  //予定の追加  
                   dayClick: function(title,date,allDay,jsEvent,view){
                      $('#myModal').modal(); 
                      
                   },
                  eventClick: function(event){
                     
                      //eventのidを取得
                      var eventedid = event.id ;
                      var event_title = event.title;
                      var event_start_data = event.start;
                      var event_end_data = event.end;
                      var event_start = moment(event_start_data).format('YYYY-MM-DD');
                      var event_end = moment(event_end_data).format('YYYY-MM-DD');
                      //var event_end_time = moment(event_end_time_data).format('mm:ss');
                      //var event_start_time = moment(event_start_data).format('mm:ss');
                      
                    //モーダル展開時の処理
                  $('#upModal').on('show.bs.modal', function (event) {
               
  //eventのidの変数をモーダルに渡すAjaxの処理

  var modal = $(this) ;//モーダルを取得
  modal.find('.modal-body input#eventid').val(eventedid);//inputタグに表示
  modal.find('.modal-body input#up_title').val(event_title);
  modal.find('.modal-body input#up_start_date').val(event_start);
  modal.find('.modal-body input#up_end_date').val(event_end);
  //modal.find('.modal-body input#up_end_time').val(event_end_time);
  //modal.find('.modal-body input#up_start_time').val(event_start_time);
  });
$('#upModal').modal(); 

                     
    },
                  
                       
                          
                     //alert(eventid);
                  
                    // $('#upModal').modal(); 
                     
        　　　　　　　　　　　//イベントをviewの切り替わり時に習得
                   
             events: function(start, end,timezone, callback) {
           // ***** ここでカレンダーデータ取得JSを呼ぶ *****
           setCalendarList(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), callback);
        }    
        
        });
		
	});
         
        
</script>


<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>
   
   <button type="button" class="btn btn-primary" value="リンク" onClick="location.href='http://127.0.0.1:8000/logout'">ログアウト</button>
　　
   
   <div id='calendar'></div>
   
   <!-- 予定追加時のモーダル -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         
      <div class="modal-dialog　add" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">予定追加</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
            
              <label for="title">タイトル</label>
              <input id="title" type="text" class="form-control" name="title">
            </div>
              <div class="form-group">
            
              
              
              <div class="form-group">
            
              <label for="start_date">開始日</label>
              <input id="start_date" type="date" class="form-control" name="start_date">
            </div>
              
              <div class="form-group">
            
              <label for="end_date">開始時間</label>
              <input id="start_time" type="time" class="form-control" name="start_time">
            </div>
                 
                  <div class="form-group">
            
              <label for="end_date">終了時間</label>
              <input id="end_time" type="time" class="form-control" name="end_time">
            </div>
                  
                  <div class="form-group">
            
              <label for="end_date">終了日時</label>
              <input id="end_date" type="date" class="form-control" name="end_date">
            </div>
                  <div class="form-group">
                     
              <label for="end_date">予定の色</label>
              <input id="calendar_color" type="color" class="form-control" name="calendar_color">
            </div>
                  
               
</div>           
                  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            <button type="submit"  class="btn btnprimary" onclick="check()">保存する</button>
          </div>
        </div>
  
      </div>
   </div>
         
  <!-- 予定更新時のモーダル -->
   <div class="modal fade" id="upModal" tabindex="-1" role="dialog" aria-labelledby="upModalLabel">
      <div class="modal-dialog update" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">予定変更</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
            
              <label for="title">タイトル</label>
              <input id="up_title" type="text" class="form-control" name="up_title" value="">
            </div>
              <div class="form-group">
            
              
              
              <div class="form-group">
            
              <label for="start_date">開始日時</label>
              <input id="up_start_date" type="date" class="form-control" name="up_start_date" value="">
            </div>
                  
                   <div class="form-group">
            
              <label for="end_date">開始時間</label>
              <input id="up_start_time" type="time" class="form-control" name="up_start_time" value="" >
            </div>
                 
                  <div class="form-group">
            
              <label for="end_date">終了時間</label>
              <input id="up_end_time" type="time" class="form-control" name="up_end_time" value="">
            </div>
              
              <div class="form-group">
            
              <label for="end_date">終了日時</label>
              <input id="up_end_date" type="date" class="form-control" name="up_end_date" value="">
            </div>
                  
                  <div class="form-group">
                     
              <label for="end_date">予定の色</label>
              <input id="up_calendar_color" type="color" class="form-control" name="up_calendar_color">
            </div>
                
                  <div class="form-group">
                      <input type="hidden" id="eventid" name="eventid" value="">
   
                  </div> 
</div>           
                  
          </div>
          <div class="modal-footer">
              <button type="submit" id="content" class="btn btn-primary" onclick="deletecheck()"><i class="glyphicon glyphicon-trash"></i></button>
            <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
            <button type="submit"  class="btn btn-primary" onclick="updatecheck()">保存する</button>
          </div>
        </div>
  
      </div>
        
   </div>
      
</body>

</html>


