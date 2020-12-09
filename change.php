<?php  

require_once('connection.php');
if(!empty($_POST['submit'])){
// taking user entered values

$username= mysqli_real_escape_string($con,$_POST['username']);
$currentpassword=mysqli_real_escape_string($con,$_POST['currentpassword']);
$newpassword=mysqli_real_escape_string($con,$_POST['newpassword']);
$errorcount=0;
// validation
if(empty($username)){
    echo nl2br("Username cannot be blank \n");
    $errorcount=$errorcount+1; };
if(empty($currentpassword)){
    echo nl2br("Current Password cannot be blank \n");
    $errorcount=$errorcount+1;};
if(empty($newpassword)){
        echo nl2br("New Password cannot be blank \n");
        $errorcount=$errorcount+1;};

if($errorcount ==0){
$newpass=md5($newpassword);
$currentpassword=md5($currentpassword);
$query="SELECT * FROM users WHERE username='$username' and password='$currentpassword' ";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count>0){ 
    $changepass="UPDATE users SET password='$newpass' WHERE username='$username' ";
 if(mysqli_query($con,$changepass)){
        echo "<p> CHANGE SUCCESSFUL</p><br>";
        echo "<p> Go to Home<a href='Login.php'> Home</a></p>";
    }
}
else{echo "Login Unsuccessful!!";
    echo nl2br("The page refreshes and then you can enter your credentials");
    header("refresh:5,url='change.php'");}
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
* {
            box-sizing: border-box;
            font-family: sans-serif;
          }
          body {font-family:Comfortaa; 
            background-color:lightpink;}
          .registration {
            width: 400px;
            height: 500px;
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
            color: white;
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
    <form action="change.php" method="POST" name="form" class="form">
        <h2>CHANGE</h2>
        <div>
            <!--<label for="username">Username</label> -->
            <input type="text" name="username" required placeholder="Username">
        </div>
    <div>
        <!-- <label for="currentpassword"> Current Password</label> -->
        <input type="password" name="currentpassword" required placeholder="Current Password">
        <br>
        <!-- <label for="newpassword"> New Password</label> -->
        <input type="password" name="newpassword" required placeholder="New Password">
    </div>
        <div>
            <input type="submit" value="Submit" name="submit"></input>
        </div>







    </form>


    </div>
</body>
</html>