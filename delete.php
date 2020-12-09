<?php
    $username = $_GET['name'];
    include_once('connection.php');
    $sql = "DELETE FROM users where username='$username'";
    mysqli_query($con,$sql);

?>