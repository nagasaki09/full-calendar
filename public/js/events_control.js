/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * イベントの取得、追加、更新、削除の処理が記述してあるJSファイルです。
 * 
 * 
 */

/**
 * 対象日付スケジュールデータセット処理
 * @param {type} startDate
 * @param {type} endDate
 * @param {type} callback
 * @returns {undefined}
 */
function setCalendarList(startDate, endDate, callback) {
  
  $.ajax({
    type: 'GET',
    dataType : "text",
    async: true,
    cache: false,
    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
    url :"/calendar/ajax",
    //ajax通信エラー
    error : function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("ajax通信に失敗しました");
        console.log("XMLHttpRequest : " + XMLHttpRequest.status);
        console.log("textStatus     : " + textStatus);
        console.log("errorThrown    : " + errorThrown.message);
    },
    //ajax通信成功
    success : function(response) {
        console.log("ajax通信に成功しました");
        console.log(response);
    }
  })
  .then(
    function(data) {
      // JSONパース
      var obj = jQuery.parseJSON(data);
      var events = [];
      
      $.each(obj, function(index, value) {
        events.push({
          // イベント情報をセット
          id: value['id'],
          title: value['title'],
          description: value['description'],
          start: value['start'],
          end: value['end'],
          color: value['color'],
          textColor: value['textColor']
         // start_time: value['start_time'],
          //end_time: value['end_time']
        });  
      });
      
      // コールバック設定
      callback(events);
    }
  );

  return;
  
}


//予定追加
function   addRecord ()   { 
    
     // get values 
     
     var   title   =   $ ( "#title" ) . val ( ) ; 
     var   start_date   =   $ ( "#start_date" ) . val ( ) ; 
     var   end_date   =   $ ( "#end_date" ) . val ( ) ; 
     //var   created_user_id        =    $  ("#created_user_id") . val ( ) ;
     var   start_time   =   $ ( "#start_time" ) . val ( ) ; 
      var   end_time   =   $ ( "#end_time" ) . val ( ) ;
      var   calendar_color   =   $ ( "#calendar_color" ) . val ( ) ;
   
     // Add record 
     $ . get ( "/calendar/ajax/addRecord" ,   { 
         
         title :   title , 
         start_date :   start_date ,
         end_date :   end_date ,
         start_time : start_time ,
         end_time :end_time ,
         calendar_color : calendar_color,
        // created_user_id       :  created_user_id,
         
    success : function(response) {
        console.log("追加に成功しました");
        console.log(response);
        
        
    }
    
    
    } ,   function   ( data ,   status )   { 
         // close the popup 
         $ ( "#myModal" ) . modal ( "hide" ) ; 
 
         // read records again 
         
 
         // clear fields from the popup 
         
         $ ( "#title" ) . val ( "" ) ; 
         $ ( "#start_date" ) . val ( "" ) ; 
         $ ( "#end_date" ) . val ( "" ) ; 
        // $ ( "#created_user_id" ) . val ( "" ) ; 
     } ) ; 
  
     return;
     
 } 
 
 function check(){
     
  if(document.getElementById('title').value === "",
     document.getElementById('start_date').value === "",
     document.getElementById('end_date').value === ""){
  alert("空の入力項目があります");
  }else{
      $.when(addRecord()).done(function(){$('#calendar').fullCalendar('refetchEvents');});
      
  
};
}
 
 
 
 //予定更新、修正
 function   updateRecord ()   { 
    
    
     // get values 
     
     var   title   =   $ ( "#up_title" ) . val ( ) ; 
     var   start_date   =   $ ( "#up_start_date" ) . val ( ) ; 
     var   end_date   =   $ ( "#up_end_date" ) . val ( ) ; 
     var   id    =     $ ("#eventid") . val ( ) ;
      var   start_time   =   $ ( "#up_start_time" ) . val ( ) ; 
      var   end_time   =   $ ( "#up_end_time" ) . val ( ) ;
      var   calendar_color   =   $ ( "#up_calendar_color" ) . val ( ) ;
            
      //Add record 
    $ . get ( "/calendar/ajax/updateRecord" ,   { 
         
         title :   title , 
         start_date :   start_date ,
         end_date :   end_date ,
         id       :   id,
         start_time : start_time ,
         end_time :end_time ,
         calendar_color : calendar_color
         
     } ,   function   ( data ,   status )   { 
         // close the popup 
        $ ( "#upModal" ) . modal ( "hide" ) ; 
 
         // read records again 
         
 
         // clear fields from the popup 
         
         $ ( "#up_title" ) . val ( "" ) ; 
         $ ( "#up_start_date" ) . val ( "" ) ; 
         $ ( "#up_end_date" ) . val ( "" ) ; 
         $ ( "#up_created_user_id" ) . val ( "" ) ; 
     } ) ; 
    return;
 } 
 
 function updatecheck(){
      if(document.getElementById('up_title').value === "",
     document.getElementById('up_start_date').value === "",
     document.getElementById('up_end_date').value === ""){
  alert("空の入力項目があります");
  }else{
  
    $.when(updateRecord()).done(function(){$('#calendar').fullCalendar('refetchEvents');});
      
  };

}

function getid() { 
    var eventid = event.id;
        alert(eventid);
        $('#upModal').modal(eventid); }
    
    


//予定削除の確認ダイアログ
function deletecheck() {
    myRet = confirm("本当に削除してもよろしいですか？");
   if ( myRet === true ){
      $.when(deleteRecord()).done(function(){$('#calendar').fullCalendar('refetchEvents');});   
         
     }
    
}

//予定削除
function deleteRecord()
{
   
     var   id    =     $ ("#eventid") . val ( ) ;
    $ . get ( "/calendar/ajax/deleteRecord" ,   { 
         
         
       id       :   id,
       success : function(response) {
        console.log("削除に成功しました");
        console.log(response);
        
        
    }
     } ,   function   ( data ,   status )   { 
         // close the popup 
        $ ( "#upModal" ) . modal ( "hide" ) ; 
         
 
         // clear fields from the popup 
         
         $ ( "#up_title" ) . val ( "" ) ; 
         $ ( "#up_start_date" ) . val ( "" ) ; 
         $ ( "#up_end_date" ) . val ( "" ) ; 
         $ ( "#up_created_user_id" ) . val ( "" ) ; 
     } ) ; 

    return;
     
 };

 