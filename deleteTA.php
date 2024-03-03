<!-- 
  PHP script embedded in an HTML document to display a table of TAs with a delete option.
  Each row contains a form to submit a delete request to 'confirmDelete.php'.
  The form includes a hidden input field to pass the TA's user ID for deletion.
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delete TA</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>
  <body>
<?php include "connecttodb.php";
include "nav.php";
$query = "SELECT * FROM ta";
$result = mysqli_query($connection,$query);   
$count = 0;

if (!$result) {     die("databases query failed.");   }   
echo "<div class=box>";
echo "<table>
      <caption>
        TA List
      </caption>
      <thead>
      <tr>
        <th scope='col'>TA User ID</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Student Number</th>
        <th scope='col'>Degree</th>
        <th scope='col'>Image</th>
        <th scope='col'>Select</th>
      </tr>
      </thead>
      <tbody>";


while ($row = mysqli_fetch_assoc($result)) {
    echo "<form action='confirmDelete.php' method='POST'>";
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

    echo "<td><button type='submit'>Delete</button></td>";
    echo "</tr>";
    echo "</form>";
    $count++;
}
echo "</tbody></table>";
echo "<form action='mainmenu.php' style='margin-top: 30px;'><button>Return</button></form>";
echo "</div>";
?>
</body>
</html>

