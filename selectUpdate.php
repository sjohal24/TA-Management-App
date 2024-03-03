<!--
  This HTML document displays a list of Teaching Assistants (TA) in a table.
  Each TA has details like User ID, First Name, Last Name, Student Number, Degree, and an Image.
  The user can select a TA to update, and upon selecting, they are redirected to 'updateTA.php'.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select TA</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>  
  <body>
<?php include "connecttodb.php";
include "nav.php";
$query = "SELECT * FROM ta";
$result = mysqli_query($connection,$query);   
$count = 0;

if (!$result) {     die("databases query failed.");   }   
echo "<table>
      <caption>
        TA List
      </caption>
      <tr>
        <th scope='col'>TA User ID</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Student Number</th>
        <th scope='col'>Degree</th>
        <th scope='col'>Image</th>
        <th scope='col'>Select</th>
      </tr>";


while ($row = mysqli_fetch_assoc($result)) {
    echo "<form action='updateTA.php' method='POST'>";
    echo "<tr>";
    echo "<input type='hidden' name='tauserid' value='" . $row['tauserid'] . "'>";
    echo "<th scope='row'>" . $row['tauserid'] . "</th>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["studentnum"] . "</td>";
    echo "<td>" . $row["degreetype"] . "</td>";
    
    if ($row['image'] == 'NULL' || $row['image'] == NULL) {
        echo "<td><img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' width=64 height=64></td>";
    } else {
        echo "<td><img src='" . $row['image'] . "' width=64 height=64></td>";
    }

    echo "<td><button type='submit'>Update</button></td>";
    echo "</tr>";
    echo "</form>";
    $count++;
}
echo "<td><form action='mainmenu.php'><button>Return</button></form></td>";
?>
</body>
</html>

