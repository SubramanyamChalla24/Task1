<?php

//making a connection 
$con=mysqli_connect("localhost","root","") or die("could not connect");
//check if database exists else create one
$database="CREATE DATABASE IF NOT EXISTS IntTechfinal";
if($con->query($database)==TRUE){
    //echo "database ITLAB created";
}
else{
    echo "<script type='text/javascript'> alert('ERROR CREATING DATABASE IntTechfinal');</script>";
}
//selecting database
$selecting_database ="use IntTechfinal;";
if($con->query($selecting_database)==TRUE){
    //echo "DATABASE IntTechfinal SELECTED";
}
else{
    echo "<script type='text/javascript'> alert('ERROR SELECTING DATABASE IntTechfinal');</script>";
}
//creating table for users
$table1 = "CREATE TABLE IF NOT EXISTS users(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) UNIQUE ,
phonenumber VARCHAR(10),
email VARCHAR(100),
designation VARCHAR(100),
password char(40)

)";
if($con->query($table1)==TRUE){
    //echo "TABLE users SUCCESSFULLY CREATED";
}
else{
    echo "<script type='text/javascript'> alert('ERROR CREATING TABLE users');</script>";
}

//creating table for crawled names and the meaning of the first name
$table2= "CREATE TABLE IF NOT EXISTS crawleddata(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) ,
    meaning VARCHAR(100)
    )";
if($con->query($table2)==TRUE){
    //echo "TABLE crawleddataSUCCESSFULLY CREATED";
}
else{
    echo "<script type='text/javascript'> alert('ERROR CREATING TABLE crawleddata');</script>";
}
$dbname="IntTechfinal";
mysqli_select_db($con,$dbname);







?>