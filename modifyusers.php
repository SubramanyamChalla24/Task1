<?php
    include_once('connection.php');
    $sql = "select * from users";
    
    if($res = mysqli_query($con,$sql)){
        echo "<table class='table' >";
        echo "<tr><th>Id</th><th>Username</th><th>Email</th><th>designation</th><th>operation</th></tr>";
        while($row= mysqli_fetch_row($res)){
            echo "
                <tr>
                    <td class='{$row[0]}'>$row[0]</td>
                    <td class='{$row[1]}'>$row[1]</td>
                    <td class='{$row[3]}'>$row[3]</td>
                    <td class='{$row[4]}'>$row[4]</td>
                
            ";

            if($row[4] == 'Normal'){
                echo "<td><a href='javascript:deletedata(\"{$row[1]}\");'>Delete user</a></td>";
                
                echo "</tr>";
            }
            else{
                echo "<td>none</td>";
                echo "</tr>";
            }
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
    <title>Document</title>
</head>
<style>
    body{
        font-family:Comfortaa;
        background-color:lightblue; 
    }
    table th,td{
        position:relative;
        left:500px;
        top:100px;
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
<body>
<p style="position:relative;left:600px;top:500px; font-size:30px;">Go to Main Page?<a href="adminpage.php">Admin Page</a></p>
</body>
<script>
  function deletedata(value){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.assign('modifyusers.php');
                    console.log("deleted "+ value);
                } 
            };
            xmlhttp.open("GET","delete.php?name="+value,true);
            xmlhttp.send();
        }
</script>
</html>