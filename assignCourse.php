<!-- 
    HTML document for assigning a TA to a course offering.
    Displays lists of TAs and course offerings with radio buttons for selection.
    Includes a form to submit the assignment with the selected TA, course offering, and hours.
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assign TA</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>
  <body>
<?php include "connecttodb.php";
include "nav.php";
$query = "select * from ta";
$result = mysqli_query($connection,$query); 
echo "<form action='taAssigned.php' method='POST'>";
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
echo "<tr>";
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
echo "<td><input type='radio' id='ta' name='ta-list' value='" . $row['tauserid'].  "'/></td>";
echo "</tr>";
}

$query = "select * from courseoffer join course on coursenum=whichcourse;";
$result = mysqli_query($connection,$query); 

echo "<table>
      <caption style='margin-top: 60px;'>
        Course Offering List
      </caption>
      <tr>
        <th scope='col'>COID</th>
        <th scope='col'>Num of Students</th>
        <th scope='col'>Term</th>
        <th scope='col'>Year</th>
        <th scope='col'>Course Number</th>
        <th scope='col'>Course Name</th>
        <th scope='col'>Select</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
    echo "<th scope='row'>" . $row['coid'] . "</th>";
    echo "<td>" . $row["numstudent"] . "</td>";
    echo "<td>" . $row["term"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
    echo "<td>" . $row["coursenum"] . "</td>";
    echo "<td>" . $row["coursename"] . "</td>";
echo "<td><input type='radio' id='ta' name='co-list' value='" . $row['coid'].  "'/></td>";
echo "</tr>";
}
echo "</table>";
echo "<div style='margin-top: 20px'><label for='hours'>Hours: </hours><input type='number' min='0' name='hours' id='hours'></div>";
echo"<div style='margin-top: 20px'><button>Submit</button></div>";
echo "</form>";
 ?>  
</body>
</html>
