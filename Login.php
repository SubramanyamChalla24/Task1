    <?php  
session_start();
require_once('connection.php');
if(isset($_COOKIE["login"])){
    if($_COOKIE['role'] == 'Normal'){
        header('Location: userpage.php'); 
    }elseif($_COOKIE['role']== 'Admin'){
        header('Location: adminpage.php');
    }
    
}else{
    if(isset($_SESSION['login'])){
        if($_SESSION['role'] == 'User'){
            header('Location: userpage.php'); 
        }elseif($_SESSION['role']=='Admin'){
            header('Location: adminpage.php');
        }
    }
}

if(!empty($_POST['submit'])){
// taking user entered values

$username= mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$errorcount=0;
// validation
if(empty($username)){
    echo nl2br("Username cannot be blank \n");
    $errorcount=$errorcount+1; };
if(empty($password)){
    echo nl2br("Password cannot be blank \n");
    $errorcount=$errorcount+1;};

if($errorcount ==0){
$password=md5($password);
$query="SELECT * FROM users WHERE username='$username' and password='$password'  ";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
if($count==1){
        if(!empty($_POST['remember'])){
            setcookie("login","true",time() + 86400);
            setcookie("role",$row['designation'], time() + 86400);
        }
        $_SESSION['login'] = 1;
        $_SESSION['role'] = $row['designation'];

    

    $designation=$row['designation'];
    if($designation=='Admin'){
        $_SESSION["username"]=$row['username'];
        header('location:adminpage.php');
    }
    else{
        $_SESSION["username"]=$row['username'];
    header("location:userpage.php");}
    }
else{echo "Login Unsuccessful!!";
    echo nl2br("The page refreshes and then you can enter your credentials");
    header("refresh:5,url='Login.php'");
}
}
else{
    echo nl2br("The page refreshes and then you can enter your credentials");
    header("refresh:5,url='Login.php'");
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
</head>
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
<body>
    <div class="registration">
    <form action="Login.php" method="POST" class="form">
    <h2>Welcome Back</h2>
        <div>
           <!--  <label for="username">Username</label> -->
            <input type="text" name="username" required placeholder="Username" >
        </div>
    <div>
        <!-- <label for="password">Password</label> -->
        <input type="password" name="password" required placeholder="Password">

    </div>


        <div>
            <input type="submit" value="Submit" name="submit" style="cursor:pointer;"></input>
            <p style="color:white;">New User? <a href="Signup.php">Register Here</a></p>
        </div>
        <div>
        <label for="remember" style="color:white; position:absolute;top:470px; left:580px;">Remember me:</label>
        <input type="checkbox" id="remember" name="remember" value="remember">
                
        </div>
        
 </form>


    </div>
   
</body>
</html>