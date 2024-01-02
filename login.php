<?php
require("myglobals.php");

$sql = "select * from admin where name='".$_POST['name']."'";
$result = $bdd->prepare($sql);
$result->execute();

if($result->rowCount() >= 1){
  $admin = $result->fetch(PDO::FETCH_ASSOC);
  if (password_verify($_POST['password'], $admin['password'])){
    $_SESSION['admin'] = $admin['admin_id'];
    header("Location: index.php");
  }
}
?>