<?php
include 'int.php';
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-warning">
  <div class="container-fluid">
  <a class="navbar-brand text-warning" href="cv.php?do=<?php echo $_GET["do"] ?>">
      <div id="logo"> 
            <span class="pluslogo">+</span> 
            <span class="logospn">P</span>
            <span class="logospn">D</span>
            <span class="logospn">F</span>
      </div>
    </a>
    <button
      class="navbar-toggler text-warning"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-warning" aria-current="page" href="cv.php?do=<?php echo $_GET["do"] ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="create.php?do=<?php echo $_GET["do"] ?>">Create CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="edit.php?do=<?php echo $_GET["do"] ?>">Edit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="about.php?do=<?php echo $_GET["do"] ?>">ABOUT/CONTACT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-warning" href="oldcv.php?do=<?php echo $_GET["do"] ?>">MY old cv</a>
        </li>
        <li>
        <a
        class="dropdown-toggle d-flex align-items-center hidden-arrow"
        href="#"
        id="navbarDropdownMenuLink"
        role="button"
        data-mdb-toggle="dropdown"
        aria-expanded="false"
      >
        <img
        <?php 
           $img = $conn->prepare("SELECT * FROM img WHERE forimg=:id_user");
           $img->bindParam(":id_user",$_GET["do"]);
           $img->execute();
           $fetch = $img->fetch();
                ?>
          src="<?php echo $fetch["src"] ?>"
          class="rounded-circle"
          height="53"
          width="53"
          alt="Black and White Portrait of a Man"
          loading="lazy"
          style="position:absolute; top:50%; right:4%; z-index:1000;
          transform:translateY(-50%)"; 
        />
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="navbarDropdownMenuLink"
      >
        <li>
          <a class="dropdown-item" href="profile.php?do=<?php echo $_GET["do"] ?>">My profile</a>
        </li>
        <li>
          <a class="dropdown-item" href="edit.php?do=<?php echo $_GET["do"] ?>">Settings</a>
        </li>
        <li>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </li>
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
$ft = $conn->prepare("SELECT * FROM user WHERE id_user=:do");
$ft->bindParam('do',$_GET["do"]);
if($ft->execute()){

}
$fetch = $ft->fetch();
if(isset($_POST["btncr"])){
     $fname = $_POST["fname"];
     $lname = $_POST["lname"];
     $email = $_POST["email"];
     $oldp = $_POST["oldp"];
     $img = $_FILES["img"]["name"];
     move_uploaded_file($_FILES["img"]["tmp_name"],$_FILES["img"]["name"]);
     $hashold = openssl_encrypt($oldp,"AES-256-CBC","taha",0,"1234567812345678");
     $newp = $_POST["newp"];
     $hashnew = openssl_encrypt($newp,"AES-256-CBC","taha",0,"1234567812345678");
     if($fetch["password"] == $hashold){
        $stmt = $conn->prepare("UPDATE user SET fname=:fname , lname=:lname, email=:email, password=:password");
        $stmt->bindParam(':fname',$fname);
        $stmt->bindParam(':lname',$lname);
        $stmt->bindParam(':email',$email);   
        $stmt->bindParam(':password',$hashnew);  
        if($stmt->execute()){
            $_SESSION["fname"] = $fname;
            $_SESSION["lname"] = $lname;
            $updimg = $conn->prepare("UPDATE img SET src=:src WHERE forimg=:id_user");
            $updimg->bindParam(":id_user",$_GET["do"]);
            $updimg->bindParam(":src",$img);
            $updimg->execute();
            header("location:login.php");
        }
        else{
             echo "execute not good";
        }
     }
     else{
         $error = "sorry your old password is wrong";
         redirect($error,4,"edit.php?do=".$_GET["do"]);
     }
}
?>
<div class="container" style="margin-top:70px">
<h1 class="text-warning">edit page</h1>
<form enctype="multipart/form-data" method="post" action="">
    first name :  <input required  type="text" class="form-control" value=<?php echo $fetch["fname"]?> placeholder="First name" name="fname">
    last name :   <input required  type="text" class="form-control" value=<?php echo $fetch["lname"]?> placeholder="Last name" name="lname">
    email :       <input required  type="email" class="form-control" value=<?php echo $fetch["email"]?> placeholder="Your email" name="email">
    image :       <input required class="mt-1"  type="file" name="img"> <br>
    old password : <input required required type="password" class="form-control" placeholder="your old password" name="oldp">
    new password : <input required type="password" class="form-control" placeholder="your new password" name="newp">
    <button name="btncr" type="submit" class="btn btn-warning mt-2">edit now</button> <br>
</form> 
</div>

<?php
include 'footer.php';