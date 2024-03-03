<!-- 
  Displays the work history of a specific TA, including course details, hours worked, and preferences.
  Preferences are represented by icons (thumbs up or down), or 'No Preference' if not specified.
  The script uses data from the 'workhistory', 'hates', and 'loves' tables in the database.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel='stylesheet' href='selectTA.css'>
</head>
<body>
<?php 
$tauserid = $_POST['ta'];
include "connecttodb.php";
include "nav.php";
$query = "select * from workhistory where tauserid = '$tauserid'";
$result = mysqli_query($connection, $query);

echo "<h1>Viewing Work History of $tauserid</h1>";
echo "<table>
      <tr>
        <th scope='col'>Course Name</th>
        <th scope='col'>Course Number</th>
        <th scope='col'>Term</th>
        <th scope='col'>Year</th>
        <th scope='col'>Hours</th>
        <th scope='col'>Preference</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr'>";
    echo "<td scope='row'>" . $row['coursename'] . "</td>";
    echo "<td>" . $row["coursenum"] . "</td>";
    echo "<td>" . $row["term"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
    echo "<td>" . $row["hours"] . "</td>";
$course = $row['coursenum'];
$query2 = "select * from hates where htauserid = '$tauserid' and hcoursenum = '$course'";
$result2 = mysqli_query($connection, $query2);
$query3 = "select * from loves where ltauserid = '$tauserid' and lcoursenum = '$course'";
$result3 = mysqli_query($connection, $query3);
if($row2 = mysqli_fetch_assoc($result2)){
echo "<td><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlwCTSDsqgRvwI-6xphcZ9s62UbPr0pXzIzQ&usqp=CAU' height=50 width=50</td>";
}
else if($row3 = mysqli_fetch_assoc($result3)){
echo "<td><img src='https://signaturesatori.com/wp-content/uploads/2017/03/Thumbs-up-clipart-2.png' height=50 width=50</td>";
}else{
echo "<td>No Preference</td>";
}
    echo "</tr>";
}
echo "</table>";
?>
<div style='display: flex'>
  <a href='tahasworked.php'>
<button style='margin-top: 30px; margin-left: 30px;'>Return</button>
</a>
<a href='mainmenu.php'>
<button style='margin-top: 30px; margin-left: 30px;'>Home</button>
</a>
</div>
</body>
</html>
