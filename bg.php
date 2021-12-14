<?php
include 'int.php';
?>
<nav class="navbar navbar-expand-lg navbar-warning">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="#">Navbar</a>
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
        <li>
          <a class="dropdown-item" href="bg.php">Change Background</a>
        </li>
      </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
 <h1>Change Background Color</h1>
 <div>
      <button id="#colorred" class="btn btn-danger">RED</button>
      <button id="#colorgreen" class="btn btn-success">GREEN</button>
 </div>
</div>
<?php
include 'footer.php';