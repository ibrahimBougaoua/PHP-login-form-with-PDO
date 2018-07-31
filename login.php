<?php
// try connection to database
try 
{
  $pdo = new PDO('mysql:host=localhost;dbname=users', 'root', '');

}
catch (PDOException $e) 
{
    echo 'Error: ' . $e->getMessage();
    exit();
}

session_start();

if (!empty($_SESSION["user_login"])) {
    header("location: index.php");
}

// Query
if (isset($_POST["login"])) {
$user_login = $_POST["user_login"];
$user_password  = $_POST["user_password"];
$code = $pdo->prepare("SELECT user_login,user_password FROM users WHERE user_login = '$user_login' AND user_password = '$user_password'");
$code->execute();
$data = $code->fetch(PDO::FETCH_ASSOC);
if ($data["user_login"] == $_POST["user_login"] && $data["user_password"] = $_POST["user_password"]) {
    session_start();
    $_SESSION["user_login"] = $_POST["user_login"];
    $_SESSION["user_password"] = $_POST["user_password"];
    header("location: index.php");
} else {
  echo "error";
}

}
?>
<link rel="stylesheet" href="style.css"  />

<div class="row">

<form method="POST">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user_login" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="user_password" required>

    <button type="submit" name="login">Login</button>

  </div>

</form>

</div>