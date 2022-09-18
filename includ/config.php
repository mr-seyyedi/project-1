<?php  
    $dbHost="localhost";  
    $dbName="blog";  
    $dbUser="root";      
    $dbPassword="";      
    $db= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword);  
session_start();
define('ADMINUSER','admin');
define('PASSWORD','admin');