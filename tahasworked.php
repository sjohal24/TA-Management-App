<!--
  This document displays a list of Teaching Assistants (TA) in a table format.
  Each row contains information about a TA, and the user can click on a TA to view their work history.
  It includes a "Home" button for navigation.
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
$query = "select * from ta";
$result = mysqli_query($connection, $query);
$count = 0;
echo "<h3>Please Click on TA to Select</h3>";
echo "<table>
<caption>
        Course Offering List
      </caption>
      <tr>
        <th scope='col'>TA User ID</th>
        <th scope='col'>First Name</th>
        <th scope='col'>Last Name</th>
        <th scope='col'>Student Number</th>
        <th scope='col'>Degree</th>
        <th scope='col'>Image</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<form id='form_$count' action='workhistory.php' method='POST'>";
    echo "<tr class='clickable-row' onclick='submitForm($count)'>";
    echo "<input type='hidden' name='ta' value='" . $row['tauserid'] . "'>";
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
