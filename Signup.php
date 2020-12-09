<?php  
session_start();
require_once('connection.php');
if(isset($_POST['submit'])){
// registering users
    $username= mysqli_real_escape_string($con,$_POST['username']);
    $phonenumber=mysqli_real_escape_string($con,$_POST['phonenumber']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
   
    $errorcount=0;
    // validation
    if(empty($username)){
        echo nl2br(" username cannot be blank\n");
        $errorcount=$errorcount+1; };

    if(empty($phonenumber)){
        echo nl2br("Phonenumber cannot be blank \n");
        $errorcount=$errorcount+1;};
    if(empty($password)){
        echo nl2br(" Password cannot be blank \n");
        $errorcount=$errorcount+1;};
    if(empty($email)){
            echo nl2br(" Email cannot be blank \n");
            $errorcount=$errorcount+1;};

    if($errorcount ==0){
    $password=md5($password);

    $query="INSERT INTO users(username,phonenumber,email,designation,password) VALUES ('$username','$phonenumber','$email','Normal','$password')" ;
    if(mysqli_query($con,$query)){
        // echo "<p> REGISTRATION SUCCESSFUL </p><br>";
        $_SESSION['username']=$username;     
        
        header('location:userpage.php');
           
    }
    else{
        $s4 = "Error! ";
		$s5 = $con->error;
		$s6 = $s4.$s5;
		echo '<script> alert("'.$s6.'"); </script>';
    }
    
    
    }
    
    else{
        
        echo nl2br("The page refreshes and then you can enter your credentials");
        header("refresh:5,url='Signup.php'");
    }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>Registration</title>
    <style>
        body {font-family:Comfortaa;
        background-color:lightpink; }
        * {
            box-sizing: border-box;
            font-family: sans-serif;
          }
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

    <form action="Signup.php" method="POST" name="signup"  id="signup" onsubmit="return validation()" class="form">
    <h2> Welcome </h2>
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
        <input type="submit" value="Submit" name="submit" style="cursor:pointer;"></input>
        <p style="color:white;">Already Registered?<a href="Login.php">Login Here</a></p>
    </div>







    </form>


    </div>
<script>   

function validation(){
    var ph=document.getElementById("phonenumber");
    var email=document.getElementById("email");
if(ph.value==""){
    alert("Please enter phone number");

}
else{
    var phoneno = /^\d{10}$/;
    if(ph.value.match(phoneno)){
        return true;
    }
    else{
        alert("Please enter a proper phone number with 10 digits");
        document.getElementById('signup').reset();
        return false;
        
        
    }
}

if (email.value == "")                                   
    { 
        alert("Please enter a valid e-mail address."); 
        email.focus();
        return false; 
 
    } 
else{
    var emailcheck=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(email.value.match(emailcheck)){
        return true;
    }
    else{
        alert("Wrong email format");
        email.focus()
        return false;

    }

}
return true;
}
</script>
</body>
</html>
