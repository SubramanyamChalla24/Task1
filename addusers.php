<?php
include('connection.php');
if(isset($_POST['Add'])){
  $username=$_POST['username'];
  $phonenumber=$_POST['phonenumber'];
  $email=$_POST['email'];
  $password =$_POST['password'];
  $password=md5($password);
  $query= "INSERT INTO users (username,phonenumber,email,designation,password) VALUES ('$username','$phonenumber','$email','Normal','$password')" ;
  if ($con->query($query) == TRUE) {
    echo '<script>
        alert("User Added succesfully!");
        window.location.href("admin.php");
      </script>';
  } else {
    $s4 = "Error! ";
    $s5 = $con->error;
    $s6 = $s4.$s5;
    echo '<script>
      alert("'.$s6.'");
      window.location.href="adminpage.php";
      </script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>ADDING USER PAGE</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: sans-serif;
          }
          body {font-family:Comfortaa;
          background-color:lightpink; }
          .registration {
            width: 400px;
            height: 600px;
        
            background: url(http://68.media.tumblr.com/2b27908fac782ca54cc2b3aff6862423/tumblr_mra3owkIhC1ro855no1_500.gif) center center no-repeat;
            background-size: cover;
            margin: 30px auto;
            border-radius: 3px;
            
          }
          .registration .form {
            width: 100%;
            height: 100%;
            padding: 15px 20px;;
          }
          .registration .form h2 {
            color: #FFF;
            text-align: center;
            font-weight: normal;
            font-size: 18px;
            margin-top: 60px;
            margin-bottom: 80px;
          }
          .registration .form input {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            background: rgba(255,255,255,.5);
            border: 1px solid rgba(255,255,255,.1);
            padding: 0 15px;
            color: #FFF;
            border-radius: 2px;
            font-size: 14px;
          }
          .registration .form input:focus {
            border: 1px solid rgba(255,255,255,.8);
            outline: none;
          }
          ::-webkit-input-placeholder {
              color: #DDD;
          }
          .registration .form input.submit {
            background: rgba(255,255,255,.9);
            color: #444;
            font-size: 15px;
            margin-top: 40px;
            font-weight: bold;
            
          }
    </style>
</head>
<body>
<div class="registration">
<form action="addusers.php" method="POST" class="form" id='toggleform'>
<h2> Welcome to Adding Users </h2>
        <div>
            <!-- <label for="username">Username</label> -->
            <input type="text" name="username" required placeholder="Username">
        </div>
        <div>
            <!-- <label for="phonenumber">Phone Number </label> -->
            <input type="text" name="phonenumber" id="phonenumber"  required placeholder="PhoneNumber">

        </div>
    <div>
        <!-- <label for="password">Password</label> -->
        <input type="password" name="password"  required  placeholder="Password">

    </div>
    <div>
        <!-- <label for="email"> Email </label> -->
        <input type="text " name="email" id="email" required placeholder="Email">
    </div>
    <div>
    <input type="submit" value="Add User" name="Add" id='Add' ></input>
    <p style="color:white;">Go to Main Page?<a href="adminpage.php">Admin Page</a></p>
    </div>
    </div>
</form>
</body>
</html>