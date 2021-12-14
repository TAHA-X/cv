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

<div class="container mt-5 text-center">
    <?php  
       $stmt = $conn->prepare("SELECT * FROM user WHERE id_user=:do");
       $stmt->bindParam(":do",$_GET["do"]);
       $stmt->execute();
       $fetch = $stmt->fetch();
       echo "<h2 style='color:orange';>"."hello ".$fetch["fname"]." ".$fetch["lname"]."</h2>";
    ?>
<h5>you can create a new cv from her :</h5>
<a href="create.php?do=<?php echo $_GET["do"] ?>"><button style="background:rgb(219, 219, 219); color:green; padding:50px 100px;
                          font-size:90px; border:0px; outline:0px;">+</button></a>
</div>
<?php
include 'footer.php';