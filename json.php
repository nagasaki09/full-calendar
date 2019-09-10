<?php
require_once('function.php');

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

$dbh = connectDb();

$sth = $dbh->prepare("SELECT * FROM events");
$sth->execute();

$userData = array();

while($row = $sth->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
    'id'=>$row['id'],
    'title'=>$row['title'],
    'start'=>$row['start'],
    'end'=>$row['end']
    );
}

//jsonとして出力
header('Content-type: application/json');
echo json_encode($eventData);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

