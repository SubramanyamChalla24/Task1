
<?php
session_start();
require_once('connection.php');
$checkingvariable=$_GET['checkingvariable'];
if($checkingvariable==0){

$username=$_SESSION['username'];
$query="SELECT * FROM users WHERE username='$username'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);
$phonenumber=$row['phonenumber'];
$designation=$row['designation'];
$email=$row['email'];
if($count==1){
    echo "<table style='width:100%;border: 1px solid black;'>";//display a table
    echo "<tr><th> Username</th><th>Phone number</th><th>Email </th></tr>\n";
    echo "<tr><td>{$row['username']}</td><td>{$row['phonenumber']}</td><td>{$row['email']}</td></tr>\n";
    echo "</table>";
    
    
}}
else if($checkingvariable==1){
$query="SELECT * FROM users WHERE designation='Normal'";
$result=mysqli_query($con,$query);
echo "<table style='width:100%;border: 1px solid black;'>";//display a table
echo "<tr><th> ID</th><th> Username</th><th>Phone number</th><th>Email </th></tr>\n";

while($row=mysqli_fetch_assoc($result)){
	echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['phonenumber']}</td><td>{$row['email']}</td></tr>\n";
}

echo "</table>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>Your Details</title>
<style>
     body {font-family:Comfortaa; 
            background-color:lightpink;}
            table th,td{
        position:relative;
        font-size:20px;
        height:10px;
        background-color:lightpink;
        border:1px solid;
        border-collapse:collapse;

    }
    th {
	  background-color: #1F2739;
}
    td {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}
</style>
</head>

<body>
    
</body>
</html>
