<?php
function connectDb() {
    try {
        return new PDO(pj_calendar,root,root);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

