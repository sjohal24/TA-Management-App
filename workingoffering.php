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
include 'connecttodb.php';
include "nav.php";
$coid = $_POST['coid'];
$query = "select * from hasworkedon w join ta t on w.tauserid=t.tauserid and coid='$coid'";
$result = mysqli_query($connection, $query);
$empty = 0;

$query2 = "select * from course c join courseoffer co on co.whichcourse = c.coursenum and coid='$coid'";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_fetch_assoc($result2);
echo "<h1>TAs Working on Course Offering $coid</h3>";
echo "<h1> " . $row2['coursenum'] . "<h3>";
echo "<h1>" . $row2['coursename'] . "<h3>";

echo "<table>
      <tr>
        <th scope='col'>TA User ID</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Student Number</th>
        <th scope='col'>Degree</th>
        <th scope='col'>Image</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
$empty = 1;    
echo "<tr'>";
    echo "<td scope='row'>" . $row['tauserid'] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["studentnum"] . "</td>";
    echo "<td>" . $row["degreetype"] . "</td>";
if($row["image"] != NULL && $row["image"] != 'NULL'){
  echo "<td><img src='" . $row["image"] . "' height=80 width=80></td>";    
}else{
    echo "<td><img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' height=80 width=80></td>";

}
    echo "</tr>";
}
echo "</table>";

?>  
<div style='display: flex'>
  <a href='courseofferinfo.php'>
<button style='margin-top: 30px; margin-left: 30px;'>Return</button>
</a>
<a href='mainmenu.php'>
<button style='margin-top: 30px; margin-left: 30px;'>Home</button>
</a>
</div>
</body>
</html>
