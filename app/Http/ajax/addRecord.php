<?php
    if ( isset ( filter_input( INPUT_POST, "id" ) )   &&   isset ( filter_input( INPUT_POST, "title" ) )   &&   isset ( filter_input( INPUT_POST, "start_date" ) )
     &&  isset (  filter_input( INPUT_POST, "end_date" )  ))
     { 
         // include Database connection file  
         include ( "db_connection.php" ) ; 
 
         // get values  
         $id   =   filter_input( INPUT_POST, "id" );
         $title   =   filter_input( INPUT_POST, "title" ); 
         $start_date   =   filter_input( INPUT_POST, "start_date" );
         $end_date   =   filter_input( INPUT_POST, "end_date" );
 
         $query   =   "INSERT INTO events(id, title, start_date, end_date) VALUES('$id', '$title', '$start_date', '$end_date')" ; 
         if   ( ! $result   =   mysqli_query ( $con ,   $query ) )   { 
             exit ( mysqli_error ( $con ) ) ; 
         } 
         echo   "1 Record Added!" ; 
     } 
 ?> 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

