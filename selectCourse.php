<!--
  This HTML document displays a list of courses in a table, allowing the user to select one.
  The selected course is submitted to 'getCourses.php' when the form is submitted.
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
include  "connecttodb.php";
include "nav.php";
$query = "select * from course;";
$result = mysqli_query($connection,$query); 
echo "<form action = 'getCourses.php' method='POST'>";
echo "<table>
      <caption>
        Course Offering List
      </caption>
      <tr>
        <th scope='col'>Course Number</th>
        <th scope='col'>Course Name</th>
        <th scope='col'>Level</th>
        <th scope='col'>Year</th>
        <th scope='col'>Select</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
    echo "<th scope='row'>" . $row['coursenum'] . "</th>";
    echo "<td>" . $row["coursename"] . "</td>";
    echo "<td>" . $row["level"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
echo "<td><input type='radio' id='ta' name='course' value='" . $row['coursenum'].  "'/></td>";
echo "</tr>";
}
echo "</table>";
echo "<button style='margin-top: 20px'>Submit</button>";
echo '</form>';
?> 
</body>
</html>
