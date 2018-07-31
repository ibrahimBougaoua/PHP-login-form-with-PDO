<?php
session_start();

if (empty($_SESSION["user_login"])) {
  header("location: login.php");
}
if (isset($_GET["logout"]) == "out") {
   session_destroy();
   header("location: login.php");
}
?>
<link rel="stylesheet" href="style.css"  />

<div class="index">
  <div class="row">
    <h4 class="user-title">hi, <?php echo $_SESSION["user_login"]; ?> <a href="?logout=out">logout</a></h4>
  </div>
</div>