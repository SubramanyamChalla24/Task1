<?php
session_start();
include("connection.php");
$designation=$_SESSION['designation'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
    <title>Name Generator</title>
    <style>
body {font-family:Comfortaa;
background-color:lightpink; }
      .form {
            width: 100%;
            height: 100%;
            padding: 15px 20px;
            
          }
      
    </style>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body>
<form action="namegenerator.php" method="GET" name="form" class="form"></form>
    <p style="position:absolute; left:400px;top:10px; font-size:30px;">Choose your language to generate names</p>
    <br>
    <label for="names"  style="position:absolute; left:400px;top:100px; font-size:30px;">Choose a Language:</label>

<select name="Language" id="language"  style="position:absolute; left:750px;top:100px; font-size:30px;">
  <option value="arabic">Arabic</option>
  <option value="english">English</option>
  <option value="french">French</option>
  <option value="hindi">Hindi</option>
  <option value="italian">Italian</option>
  <option value="german">German</option>
  <option value="japanese">Japanese</option>
  <option value="korean">Korean</option>
  <option value="mandarin-chinese">Chinese</option>
  <option value="russian">Russian</option>
  <option value="spanish">Spanish</option>
  <option value="swahili">Swahili</option>
  <option value="turkish">Turkish</option>
  <option value="welsh">Welsh</option>
</select>
<input type="submit" value="Show Names" id="show"  style="position:absolute; left:950px;top:100px; font-size:28px; background-color:white; cursor:pointer;" >
<?php if($designation=='Admin'){
echo ("<p  style='position:absolute; left:600px;top:300px;font-size:30px;'>Go to Main Page? <a href='adminpage.php'>Main Page</a></p>");
}
else{
  echo ("<p  style='position:absolute; left:600px;top:300px;font-size:30px;'>Go to Main Page? <a href='userpage.php'>Main Page</a></p>");
}
?>
<script>
        $(document).ready(function(){ 
        $('#show').click(function(){ 
    var selected=$('#language :selected').val();
    window.location.href="result.php?selected="+selected;
   
  });
});








</script>
</body>
</html>