<?php
session_start();
session_unset();
session_destroy();

setcookie('remember_name', '', time() - 3600, "/");
setcookie('remember_pass', '', time() - 3600, "/");

header('Location: LoginSignin.php');
exit();
?>
