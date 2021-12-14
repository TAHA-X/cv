<?php
include 'int.php';
session_start();
?>
<div class="container" style="margin-top:70px">
<h1 class="text-warning">login page</h1>
<form method="post" action="">
    email :       <input required type="email" class="form-control" placeholder="Your email" name="email">
    password :    <input required type="password" class="form-control" placeholder="your password" name="password">
    <button type="submit" name="btncr" class="btn btn-warning mt-2">login</button>
    <br>
</form> 
<form method="post">
<button style="border:none !important; outline: none !important;" class="text-primary btn-white btfr" name="frget">you forgette password ?</button>
</form>
</div>
<?php
if(isset($_POST["btncr"])){
     $email = $_POST["email"];
     $pass =  $_POST["password"];
     //$hash =  md5($pass);
     $hash = openssl_encrypt($pass,"AES-256-CBC","taha",0,"1234567812345678");
     $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    // $stmt->bindParam(':email',$email);
    // $stmt->bindParam(':ps',$hash);
     echo $hash;
    if($stmt->execute(array($email,$hash))){
         // echo "good execute";
      }
      else{
         echo "bad execute";
      }
      $count = $stmt->rowCount();
      echo $count;
      $fetch = $stmt->fetch();
      $_SESSION["iduser"] =  $fetch["id_user"];
      $_SESSION["email"] = $email;
      $_SESSION["fname"] = $fetch["fname"];
      $_SESSION["lname"] = $fetch["lname"];
      if($stmt->rowCount() > 0){
        // echo "success";
        
        header("location:cv.php?do=".$_SESSION["iduser"]."&fn=".$_SESSION["fname"]."&ln=".$_SESSION["lname"]);
    }
    else{
       $error = "email or password is wrong , tray again";
       redirect($error,2,"login.php");
    }
}
if(isset($_POST["frget"])){
 header("Location:forget.php");
 $email = $_POST["email"];
 require "mail.php";
 $mail->setFrom('techchoual7@gmail.com', 'taha');
   // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
 $mail->addAddress($email);  
  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
   if($stmt->execute(array($email))){
    //echo "good execute";
    $count = $stmt->rowCount();
    //echo $count;
    $fetch = $stmt->fetch();
   if($stmt->rowCount() > 0){
      // echo "success";
     // header("location:cv.php?do=".$_SESSION["iduser"]);
     echo "more than 0";
         if($mail->send()){
            echo "good sent";
        }
        else{
            echo "bad sent";
        }
    }
    else{
     echo "not exist 0";
    }
   }
   else{
       echo "bad execute";
   }
}
include "footer.php";