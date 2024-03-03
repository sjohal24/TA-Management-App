<!--
    This file handles the updating of TA information. It retrieves values from a form submission using POST method, updates the database accordingly, and displays the updated TA information.
    The updated information includes TA User ID, First Name, Last Name, Student Number, Degree, and Image.
    If certain fields are not provided in the form, the existing values from the database are retained.
    The updated TA information is then displayed in a table, and there is a button to return to the home page.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Updated TA</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>
  <body>
<?php
include "connecttodb.php";
include "nav.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
 $taUserID = $_POST['tauserid'];
$query = "SELECT * FROM ta WHERE tauserid = '$taUserID'";
$result = mysqli_query($connection,$query); 
$row = mysqli_fetch_assoc($result);
if($_POST['first-name'] != ""){
$firstName = $_POST['first-name'];
$query2 = "UPDATE ta SET firstname ='$firstName' WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
}else{
$firstName = $row['firstname'];
}if($_POST['last-name'] != "" &&$_POST['first-name'] != NULL){
$lastName = $_POST['last-name'];
$query2 = "UPDATE ta SET lastname ='$lastName' WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
}else{
$lastName = $row['lastname'];
}
if($_POST['studentnum'] != ""){
$studentID = $_POST['studentnum'];
$query2 = "UPDATE ta SET studentnum ='$studentID' WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
} else{
$studentID = $row['studentnum'];
}    
if($degree = $_POST['degrees'] != "N/A"){
$degree = $_POST['degrees'];
$query2 = "UPDATE ta SET degreetype ='$degree' WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
}else{
$degree = $row['degreetype'];
}
if ($_POST['ta-image'] == 'NULL' || $_POST['ta-image'] == NULL){
$image = $_POST['ta-image'];
$query2 = "UPDATE ta SET image = NULL WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
$image = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
}
else if($_POST['ta-image'] != ""){
$image = $_POST['ta-image'];
$query2 = "UPDATE ta SET image ='$image' WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
}else{
$image = $row['image'];
$query2 = "SELECT * FROM ta WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
}
$query2 = "SELECT * FROM ta WHERE tauserid = '$taUserID'";
$result2 = mysqli_query($connection,$query2); 
$row2 = mysqli_fetch_assoc($result2);
}
echo "<body>
    <h1>TA Information Updated</h1>
    <table>
      <label>TA Information</label>
      <tr>
        <th>Ta User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student Number</th>
        <th>Degree</th>
        <th>Image</th>
      </tr>";
      
echo "<tr>
        <td>$taUserID</td>
        <td>$firstName</td>
        <td>$lastName</td>
        <td>$studentID</td>
        <td>$degree</td>
        <td> <img src='";
if($row2['image'] == NULL){
echo "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png";
}else{
echo $row2['image'];
}
         
echo "' width=64 height=64></td>
      </tr>
    </table>";
?>
<div>
<form action='mainmenu.php' style='margin-top: 30px;'><button>Home</button></form>
</div>
</body>
</html>


