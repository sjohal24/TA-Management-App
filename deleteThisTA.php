<!-- 
  PHP script embedded in an HTML document to delete a TA based on the received POST request.
  Displays a message confirming the deletion or an error message.
  Provides buttons to return to the delete TA page or navigate to the main menu.
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deleted TA</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>
  <body>
<?php
include "connecttodb.php";
include "nav.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the POST request
    $tauserid = $_POST["tauserid"];
}
$query = "DELETE FROM ta WHERE '$tauserid' = tauserid";
$result = mysqli_query($connection,$query);
if (!$result) {    
echo "<h3>Error while trying to delete TA: </h3> <h3>". mysqli_error($connection) . "</h3>";    
}else{ 
echo "<h1>TA " . $tauserid . " has been Deleted </h1>";
}
?>
<form action="deleteTA.php"> <button style='margin-right: 30px'>Return</button> <a href="mainmenu.php"> <button type='button'>Home</button> </a></form>
</body>
</html>
