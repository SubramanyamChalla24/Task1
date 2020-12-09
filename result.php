<?php
  $language=$_GET['selected'];
  include('connection.php');
  include('simple_html_dom.php');
  $sample = "https://blog.reedsy.com/character-name-generator/language/".$language ;

  $html = file_get_html($sample);
  //echo $html;
  $name=$html->find('h3');
  $firstnamemeaning=$html->find('.space-top-xs-xs.small');

  $query="DELETE FROM crawleddata";

  if($con->query($query)){

  }
  for($i=0;$i<count($firstnamemeaning);$i++){
    $query= "INSERT INTO  crawleddata (name,meaning) VALUES ('$name[$i]','$firstnamemeaning[$i]')";
    if ($con->query($query) == TRUE) {
      
    }}

  $query="SELECT * FROM crawleddata";
  $result=mysqli_query($con,$query);
echo "<table style='width:100%;border: 1px solid black;'>";//display a table
echo "<tr><th> Name</th><th>Meaning</th></tr>\n";

while($row=mysqli_fetch_assoc($result)){
	echo "<tr><td>{$row['name']}</td><td>{$row['meaning']}</td></tr>\n";
}

echo "</table>";






?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;500&amp;display=swap" rel="stylesheet">
  <title>Table for names</title>

  <style>
    body{
        font-family:Comfortaa;
        background-color:lightblue; 
    }
    table th,td{
        position:relative;

        height:10px;
        background-color:lightpink;
        border:1px solid;
        border-collapse:collapse;

    }
    th {
    
	  background-color: #1F2739;
}
    td:hover {
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
  <p style='font-size:30px;'>Go to Previous Page? <a href="namegenerator.php">NameGenerator</a></p>
  <p style='font-size:30px;'>Go to Main Page? <a href="userpage.php">Main Page</a></p>
</body>
</html>