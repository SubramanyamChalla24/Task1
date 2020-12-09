<?php
session_start();
if(!isset($_COOKIE["login"])){
  if(!isset($_SESSION["login"])){
     header('Location: Login.php');
  }
  elseif($_SESSION['role']=='Normal'){
      header('Location: userpage.php');
  }
}elseif($_COOKIE['role']=='Normal'){
  header('Location: userpage.php');
}

include('connection.php');
$username=$_SESSION['username'];
$query="SELECT * from users WHERE username='$username'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$designation=$row['designation'];
$_SESSION['designation']=$designation;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>Admin Page</title>
<style>
* {box-sizing: border-box}
body {font-family:Comfortaa;
background-color:lightpink; }
.nav {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.nav a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 25%; /* Four links of equal widths */
  text-align: center;
}

.nav a:hover {
  background-color: #000;
}

.nav a.active {
  background-color: #4CAF50;
}

.sidenav {
  width: 130px;
  position:absolute;
  height:100%;
  z-index: 1;
  top: 60px;
  left: 10px;
  background: #eee;
  overflow-x: hidden;
  padding: 8px 0;
  
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #2196F3;
  display: block;
    
}

.sidenav a:hover {
  color: #064579;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 15px;
  text-align:center;
}
.toggle{
  display:none;
  position:absolute;
  top:200px;
  left:700px;
}
#Introduction{
  font-size:30px;
  background-color: #FFF842;
  color: green;
  font-weight: bold;
  font-family:Comfortaa;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
}



</style>
<body>


<div class="nav">
  
  <a href="adminpage.php">Home</a> 
  <a href="javascript:showdetails(0);">Show Your Details</a> 
  <a href="change.php">Change Password</a> 
  <a href="Logout.php">Logout </a>
</div>


<div class="sidenav">
  <a href="namegenerator.php">Show Name Generator</a> <br><br>
  <a href="aboutthecreator.php">About the creator</a><br><br>
  <a href="contactpage.php">Contact Me</a><br><br>
  <a href="addusers.php">Add Users</a><br><br>
  <a href="modifyusers.php">Modify Users</a><br><br>
  <a href="javascript:showdetails(1);">View User Details</a><br><br>
</div>

<div>
    <p id="Introduction" style="top:100px;left:600px; position:absolute;">Welcome to Admin Page </p>


</div>

<script>
    function showdetails(checkingvariable){
        if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Introduction").innerHTML = this.responseText;
                } 
            };
            xmlhttp.open("GET","showdetails.php?checkingvariable="+checkingvariable,true);
            xmlhttp.send();

    }

    
      
</script>
</body>
</html> 
