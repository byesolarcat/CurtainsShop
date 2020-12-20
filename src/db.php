<?php
    if (!isset($_SESSION))
    {
        session_start(); 
    }
    $db_host='localhost';
    $db_user='root';
    $db_pass='root';
    $db_database='curtains_db';
    $link = mysqli_connect($db_host,$db_user,$db_pass);
    mysqli_select_db($link,$db_database) or 
        exit("Ошибка подключения к БД".mysqli_error($link));
    //$db=null;
    
    //$maxGoodId = mysqli_fetch_assoc(mysqli_query($link, "SELECT MAX(`id`) as 'max' FROM `goods`"))['max'];
?>