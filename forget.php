<?php
include 'int.php';
?>
<div class="cnforget">
     <form method="post">
           email <input type="email" class="form-control" name="email" placeholder="your email">
           <button type="submit" name="send" class="btn btn-danger mt-2">send</button>
            <a href="login.php" class="btn btn-dark mt-2">back</a>
     </form>
</div>
<?php
if(isset($_POST["send"])){
    //header("Location:forget.php");
    $email = $_POST["email"];
    require "mail.php";
    $mail->setFrom('techchoual7@gmail.com', 'taha');
      // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress($email);  
     //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'forget password';
     $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");

    if($stmt->execute(array($email))){
        $fetch = $stmt->fetch();
     $pass = $fetch['password'];
     $dec = openssl_decrypt($pass,"AES-256-CBC","taha",0,"1234567812345678");
     echo $dec;
     echo $email;
     $mail->Body    = 'hy mr/mm '.$fetch['fname']." ".'that is your old password : <h1>'.$dec.'</h1>';
       //echo "good execute";
       $count = $stmt->rowCount();
       //echo $count;
       $fetch = $stmt->fetch();
      if($stmt->rowCount() > 0){
         // echo "success";
        // header("location:cv.php?do=".$_SESSION["iduser"]);
        echo "more than 0";
            if($mail->send()){
               echo "msg send";
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
   
include 'footer.php';