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
<div class="container">
    <?php
        $stmt = $conn->prepare("SELECT * FROM img WHERE forimg=:img");
        $stmt->bindParam("img",$_GET['do']);
        $stmt->execute();
        $fetch = $stmt->fetch();
        $stmt2 = $conn->prepare("SELECT * FROM user WHERE id_user=:id_user");
        $stmt2->bindParam("id_user",$_GET['do']);
        $stmt2->execute();
        $fetch2 = $stmt2->fetch();
    ?>
    <div>
   <div class="mt-5 w-75" style="margin:0 auto; display:flex; justify-content:space-around;
                            flex-wrap:wrap;">
  <div class="p-3" style="display:flex; flex-direction:column; background-color:white; position:relative; height:460px; width:500px; border-radius:16px;" id="info">
      <div>
       <img style="width:90%; height:350px; position:absolute; left:50%; transform:translateX(-50%)" src="<?php echo $fetch["src"] ?>">
       </div>
       <div style="position:absolute; bottom:3%; left:10%">
       <span class="text-danger"><?php echo "first name : ".$fetch2["fname"] ?></span> <br>
       <span class="text-danger"><?php echo "last name  : ".$fetch2["lname"] ?></span> <br>
       <span class="text-danger"><?php echo "email  : ".$fetch2["email"] ?></span>
       </div>
  </div>
  <div id="pdfstyle" class="mt-3 mb-3">
     <?php
         $stmt = $conn->prepare("SELECT * FROM cr WHERE forigrn=:id_user");
         $stmt->bindParam("id_user",$_GET['do']);
         $stmt->execute();
         $fetch = $stmt->fetch();
         $row = $stmt->rowCount();
         echo "you have ".$row." cv <br>";
         ?>
         <a href="oldcv.php?do=<?php echo $_GET["do"]?>" ><button class='btn btn-white'>see your cv files</button></a>
         <?php
         
     ?>
  </div>
  </div>
</div>
<?php
include 'footer.php';