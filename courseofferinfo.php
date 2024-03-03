<!-- 
  PHP script embedded in an HTML document to display a table of course offerings.
  Each row is clickable, triggering a form submission to 'workingoffering.php'.
  The form includes hidden input fields to pass relevant data.
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
<?php include "connecttodb.php";
include "nav.php";
$query = "select coid, coursename, coursenum, term, co.year, numstudent from course c join courseoffer co on coursenum=whichcourse";
$result = mysqli_query($connection, $query);
$count = 0;
echo "<h3>Please Click on Course Offering to Select</h3>";
echo "<table>
<caption>
        Course Offering List
      </caption>
      <tr>
        <th scope='col'>Course Offering ID</th>
        <th scope='col'>Course Name</th>
        <th scope='col'>Course Number</th>
        <th scope='col'>Term</th>
        <th scope='col'>Year</th>
        <th scope='col'>Number of Students</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<form id='form_$count' action='workingoffering.php' method='POST'>";
    echo "<tr class='clickable-row' onclick='submitForm($count)'>";
    echo "<input type='hidden' name='coid' value='" . $row['coid'] . "'>";
    echo "<th scope='row'>" . $row['coid'] . "</th>";
    echo "<td>" . $row["coursename"] . "</td>";
    echo "<td>" . $row["coursenum"] . "</td>";
    echo "<td>" . $row["term"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
    echo "<td>" . $row["numstudent"] . "</td>";
    echo "</tr>";
    echo "</form>";
    $count++;
}
echo "</table>";
?>
  <a href='mainmenu.php'>
<button style='margin-top: 30px'>Home</button>
</a>
<script>
    function submitForm(formId) {
        document.getElementById('form_' + formId).submit();
    }
</script>
</body>
</html>
