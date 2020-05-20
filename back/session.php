<?php
session_start();

if(isset($_POST)){
    //画面遷移時
    if(isset($_POST["page"]) && isset($_POST["title"])){
        //画面識別子    
        $_SESSION['page'] = $_POST["page"];
        $_SESSION['title'] = $_POST["title"];

        //画面訪問数
        $_SESSION['visit'] = 1;
    //送信ボタン押下時
    }else if(isset($_POST["update"])){
        //画面訪問数
        $_SESSION['visit'] += 1;
    }
}