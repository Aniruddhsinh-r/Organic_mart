<?php 
    @session_start();
    include 'includes/connection.php';
    
if (isset($_POST['loginsubmit'])) {
    $name = trim($_POST['name']);
    $pass = md5($_POST['pass']);

    $userdetail = mysqli_query($conn, "SELECT * FROM `users_table` WHERE name = '$name' AND password = '$pass'");

    if (empty($name) || empty($pass)) {
        echo "<script>
            alert('Please fill in both fields.');
            window.location.href='LoginSignin.php';
        </script>";
        exit;
    }

    if (mysqli_num_rows($userdetail) > 0) {
        $row = mysqli_fetch_assoc($userdetail);
        $_SESSION['user_id'] = $row['id'];

        $cookie_time = time() + (5 * 365 * 24 * 60 * 60);
        setcookie('remember_name', $name, $cookie_time, "/");
        setcookie('remember_pass', $_POST['pass'], $cookie_time, "/");

        echo "<script>
            alert('login successfull');
            window.location.href='shop.php';
        </script>";
        
    } else {
        echo "<script>
            alert('incorrect name/password');
            window.location.href='LoginSignin.php';
        </script>";
    }
}
?>
