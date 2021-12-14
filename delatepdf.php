<?php
include 'int.php';
echo "good";
session_start();
$stmt = $conn->prepare("DELETE FROM cr WHERE id_cr=:fname");
$stmt->bindParam(':fname',$_SESSION["crid"]);
$stmt->execute();
header("Location:oldcv.php?do=".$_GET["do"]."&fn=".$_SESSION["fname"]."&ln=".$_SESSION["lname"]);
include 'footer.php';