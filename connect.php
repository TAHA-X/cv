<?php
   $dsn = "mysql:host=localhost;dbname=cv";
   $username = "root";
   $password = "";
   $options = array(
       PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
   );
   try {
    $conn = new PDO($dsn,$username,$password,$options);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
   //  echo "you are connected now ."."<br>";
   }
   catch(PDOException $e){
         echo "failed to connect".$e->getMessage();
   }
   