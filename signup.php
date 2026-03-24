<?php 
include 'includes/connection.php';

$nameErr = $mailerror = $passerror = '';
$name = $uemail = $upass = '';
if (isset($_POST['signinsubmit'])) {
    $name = trim($_POST['uname']);
    $uemail = trim($_POST['uemail']);

    if (empty($name)) {
        $nameErr = "please enter your name";
    }
    if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
        $mailerror = "Enter valid email";
    } 
    if (strlen($_POST['upass']) < 6) {
        $passerror = "please enter at least 6 character pass";
    }
    
    $upass = md5($_POST['upass']);
    if ($nameErr === '' && $mailerror === '' && $passerror === '') {
        $availabledata = mysqli_query($conn, "SELECT * FROM `users_table` WHERE email = '$uemail'");
        if (mysqli_num_rows($availabledata) > 0) {
            echo "<script>
                alert('This email account is already exist. try another email or logIn.');
                window.location.href='LoginSignin.php';
            </script>";
        } else {
            $insert_query = mysqli_query($conn, "INSERT INTO `users_table`(`name`, `email`, `password`) VALUES ('$name','$uemail', '$upass')") or die("Error inserting user: " . mysqli_error($conn));
            echo "<script>window.location.href='LoginSignin.php';</script>";
        }
    }
}
?>