<!-- 
    This file is used to display information about a newly added TA.
    It retrieves data from a form submission and displays it, including the TA's image, name, student number, degree, and course preferences.
    The TA's course preferences are divided into "Loves Courses" and "Hates Courses" categories.
    The information is retrieved from the POST request and inserted into the database.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert TA</title>
    <link rel='stylesheet' href='selectTA.css'>
    <style>
      .image{
        border-radius: 160px;
      }
      .box{
        display: flex;
  flex-direction: column;
  align-items: center;
      }
    </style>
  </head>
  <body>
<?php include "connecttodb.php";
include "nav.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $taUserID = $_POST['insert-tauserid'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $studentID = $_POST['studentnum'];
    $degree = $_POST['degrees'];
    $selectedCourses = array();

// Loop through the course numbers obtained from the database query


}
  echo "<h1>New TA Added</h1> <form class='box'>";
  echo "<h3>TA User ID: " . $taUserID  . "</h3>";
  if(isset($_POST['ta-image']) && $_POST['ta-image'] != '' &  $_POST['ta-image'] != 'NULL'){
    $image = $_POST['ta-image'];
    echo "<img src='" . $image . "' class='image' width='300' height='300'/>";
    }  else {
    $image = 'NULL';
    echo "<img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' class='image' width='300' height='300'/>";
    }
  echo "<h3>Last Name: " . $firstName . "</h3>";
  echo "<h3>Student Number: " . $lastName ."</h3>";
  echo "<h3>Degree: " . $degree . "</h3>";

$insert = "INSERT INTO ta VALUES ('$taUserID', '$firstName', '$lastName', '$studentID', '$degree', '$image')";
if (!mysqli_query($connection,$insert)) {       
die ("<h3>Error while trying to add new TA </h3> <h3>". mysqli_error($connection) . "</h3>");    
} 

echo "<h3>Course Preferences:</h3>";
  echo "<h3>Loves Courses:</h3>";

$query = "select coursenum from course";
$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $courseNum = $row["coursenum"];
    // Check if the checkbox is checked for each course
    if (isset($_POST[$courseNum])) {
  	echo "<h4>" . $_POST[$courseNum] . "</h4>";
$insert = "INSERT INTO loves VALUES ('$taUserID', '$_POST[$courseNum]')";
if (!mysqli_query($connection,$insert)) {       
die ("<h3>Error while trying to add new TA: </h3> <h3>". mysqli_error($connection) . "</h3>");    
}     
}
}

  echo "<h3>Hates Courses:</h3>";

$query = "select coursenum from course";
$result = mysqli_query($connection, $query);
$count = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $courseNum = $row["coursenum"];
    // Check if the checkbox is checked for each course
    if (isset($_POST[$count])) {
        echo "<h4>" . $_POST[$count] . "</h4>";
$insert = "INSERT INTO hates VALUES ('$taUserID', '$_POST[$count]')";
if (!mysqli_query($connection,$insert)) {       
echo "<h3>Error while trying to add new TA: 1" . mysqli_error($connection) . "</h3>";    
    }
}
$count++;
}
echo "</div>";

?>
      <a href='mainmenu.php'>
        <button type='button'>Home</button>
      </a>
  </body>
</html>


