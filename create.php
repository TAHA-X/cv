<?php
include 'int.php';
session_start();

if(isset($_POST["btncr"])){
    $fnpdf = $_POST["fnpdf"];
     $fname = $_POST["fname"];
     $lname = $_POST["lname"];
     $email = $_POST["email"];
     $job = $_POST["job"];
     $imag = $_FILES["imag"]["name"];
     move_uploaded_file($_FILES['imag']['tmp_name'],$_FILES["imag"]["name"]);
     $stmt = $conn->prepare("INSERT INTO cr(fname,lname,email,job,img,forigrn,fnpdf) VALUES(:fname,:lname,:email,:job,:img,:id_user,:fnpdf)");
     $stmt->bindParam(':fnpdf',$fnpdf);
     $stmt->bindParam(':fname',$fname);
     $stmt->bindParam(':lname',$lname);
     $stmt->bindParam(':email',$email);
     $stmt->bindParam(':job',$job);
     $stmt->bindParam(':img',$imag);
     $stmt->bindParam(':id_user',$_GET["do"]);
     if($stmt->execute()){ 
         $stmt2 = $conn->prepare("SELECT * FROM cr WHERE fname=:fname AND lname=:lname");
         $stmt2->bindParam(':fname',$fname);
         $stmt2->bindParam(':lname',$lname);
         if($stmt2->execute()){
             echo "god exexute2";
             
       while($fetch2 = $stmt2->fetch()){
         $_SESSION["crid"] = $fetch2["id_cr"];

       
    }
         }
         else{
             echo "god exexute2";
         }
         $_SESSION["fname"] = $fname;
         $_SESSION["lname"] = $lname;
         $_SESSION["email"] = $email;
         $_SESSION["job"] = $job;
         $_SESSION["imag"] = $imag;
         header("location:see.php?do=".$_GET["do"]);
       // header("location:fpdf184/test1.php?fname=".$_SESSION['crid'].'&nm='.$_SESSION['fname'].'&fn='.$_SESSION['fname'].'&ln='.$_SESSION['lname']);
     }
     else{
         echo "bad";
     }
}
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

<div class="container" style="margin-top:70px">
<h1 class="text-warning">create cv</h1>
<form method="post" enctype="multipart/form-data" action="">
    name of pdf : <input required type="text" class="form-control" placeholder="to see it later" name="fnpdf">
    first name :  <input required type="text" class="form-control" placeholder="First name" name="fname">
    last name :   <input required type="text" class="form-control" placeholder="Last name" name="lname">
   <!-- birthdate : <input type="date" class="form-control"> -->
    email :       <input required type="email" class="form-control" placeholder="Your email" name="email">
    WHAT CAN I DO : <textarea style="height:100px; min-height:100px; max-height:250px;" minlength="10" required type="text" class="form-control" placeholder="describe your job" name="job"></textarea>
    your img : <input required type="file" class="mt-2" name="imag">
    <br>
    <button name="btncr" type="submit" class="btn btn-warning mt-2">creat cv</button>
</form> 
</div>
<?php
include "footer.php";