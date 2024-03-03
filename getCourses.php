<!-- 
  PHP script embedded in an HTML document to display course offerings based on the selected course, 
  with an option to filter by start and end years. Provides buttons to return to the select course page 
  or navigate to the main menu.
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Course Offerings</title>
    <link rel='stylesheet' href='selectTA.css'>
  </head>
  <body>
<?php

include "connecttodb.php";
include "nav.php";
if(isset($_POST['course'])){
$course = $_POST['course'];
if(isset($_POST['startyear']) && isset($_POST['endyear']) && $_POST['startyear'] > 0 && $_POST['endyear'] > 0){
$query = "select * from courseoffer where whichcourse='$course' AND year >=" . $_POST['startyear'] . " AND year <=" . $_POST['endyear'];
}else{
$query = "select * from courseoffer where whichcourse='$course'";
}
$result = mysqli_query($connection,$query); 
echo "<h2>Course Offerings of $course</h2>";
echo    "<div id='courseOfferingsContainer'>";
echo "<table>
      <tr>
        <th scope='col'>COID</th>
        <th scope='col'>Num of Students</th>
        <th scope='col'>Term</th>
        <th scope='col'>Year</th>
        <th scope='col'>Course Number</th>
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
    echo "<th scope='row'>" . $row['coid'] . "</th>";
    echo "<td>" . $row["numstudent"] . "</td>";
    echo "<td>" . $row["term"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
    echo "<td>" . $row["whichcourse"] . "</td>";
echo "</tr>";
}
echo "</table>
    </div>";

echo"<form action='getCourses.php' method='POST'>   
<label for='startYear'>Start Year:</label>
<input type='hidden' name='course' value='$course'>
    <input
      type='number'
      id='startYear'
      min='1900'
      max=''
      step='1'
      name='startyear'";
if(isset($_POST['startyear']) && $_POST['startyear'] > 0){
echo "value= " . $_POST['startyear'];
}else{
echo "value=1900";
}echo "
      
    />

    <label for='endYear'>End Year:</label>
    <input
      type='number'
      id='endYear'
      name='endyear'
      min=''
      max=''
      step='1'";
if(isset($_POST['endyear']) && $_POST['endyear'] > 0){
echo "value= " . $_POST['endyear'];
}else{
echo "value=2023";
}echo "    />

    <button>Filter by Year</button></form>
<form action='selectCourse.php'>
<button>Return</button>
<a href='mainmenu.php'>
<button type='button'>Home</button>
</a>
</form>";
}else{
echo "<h2>No Course Was Selected</h2>
<form action='selectCourse.php'>
<button>Return</button>
<a href='mainmenu.php'>
<button type='button'>Home</button>
</a>
</form>";
}
?>    
<script>
      const currentYear = new Date().getFullYear();
      document.getElementById('startYear').max = currentYear;
      document.getElementById('endYear').max = currentYear;      
      console.log(currentYear);
    </script>
  </body>
</html>
