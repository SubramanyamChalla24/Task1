<?php
session_start();

if(isset($_POST['submit'])){

$to_mail   =$_POST['email']; 
$subject  =$_POST['subject'];
$message  = $_POST['message'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: ' . $_POST['email'] . "\r\n";
$headers .= 'Reply-To: ' .$_POST['email'] . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();
if(mail('challasubbu25@gmail.com',$subject,$_POST['message'],$headers)){

  echo "<script>alert('Feedback sent successfully! Thank you!');</script>";}
else{
  echo "<script>alert(Sorry failed to send this mail'');</script>";
	echo "<script> window.location.href='contactpage.php';</script>";
}
  
  
  
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">

  <style>
  body {
    background-color: #d1f3e7;
    font-family:Comfortaa;
  }
  .form {
    background: #fff;
    box-shadow: 0 30px 60px 0 rgba(90, 116, 148, 0.4);
    border-radius: 5px;
    max-width: 480px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 5px;
    padding-bottom: 5px;
    left: 0;
    right: 0;
    position: absolute;
    border-top: 5px solid #0e3721;
  /*   z-index: 1; */
    animation: bounce 1.5s infinite;
  }
  ::-webkit-input-placeholder {
    font-size: 1.3em;
  }
  
  .title{
    display: block;
    font-family: sans-serif;
    margin: 10px auto 5px;
    width: 300px;
  }
  
  
  .pageTitle{
    font-size: 2em;
    font-weight: bold;
  }
  .secondaryTitle{
    color: grey;
  }
  
  .name {
    background-color: #ebebeb;
    color: black;
  }
  .name:hover {
    border-bottom: 5px solid #0e3721;
    height: 30px;
    width: 380px;
    transition: ease 0.5s;
  }
  
  .email {
    background-color: #ebebeb;
    height: 2em;
  }
  
  .email:hover {
    border-bottom: 5px solid #0e3721;
    height: 30px;
    width: 380px;
    transition: ease 0.5s;
  }
  
  .message {
    background-color: #ebebeb;
    overflow: hidden;
    height: 10rem;
  }
  
  .message:hover {
    border-bottom: 5px solid #0e3721;
    height: 12em;
    width: 380px;
    transition: ease 0.5s;
  }
  
  .formEntry {
    display: block;
    margin: 30px auto;
    min-width: 300px;
    padding: 10px;
    border-radius: 2px;
    border: none;
    transition: all 0.5s ease 0s;
  }
.submit {
    width: 200px;
    color: white;
    background-color: #0e3721;
    font-size: 20px;
  }
.submit:hover {
    box-shadow: 15px 15px 15px 5px rgba(78, 72, 77, 0.219);
    transform: translateY(-3px);
    width: 300px;
    border-top: 5px solid #0e3750;
    border-radius: 0%;
  }
@keyframes bounce {
    0% {
      tranform: translate(0, 4px);
    }
    50% {
      transform: translate(0, 8px);
    }
  } 
  </style>
 </head>

<body>
  <div class="contactform">
    <form class="form" action="contactpage.php" method="POST">
      <div class="pageTitle title">Contact The Creator </div>
      <div class="secondaryTitle title">Fill this form to send a mail to the creator.</div>
      <input type="text" class="name formEntry" name="subject" placeholder="Subject" />
      <input type="text" class="email formEntry" name ="email" placeholder="Email"/>
      <textarea class="message formEntry" name="message" placeholder="Message"></textarea>
      
      <button type="submit" class="submit formEntry" name="submit" id="submit">Submit</button>
    </form>
  </div>

</body>

</html>