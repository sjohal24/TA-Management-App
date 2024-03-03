<!--
  This HTML document is used to display information about the assignment of a Teaching Assistant (TA) to a Course Offering.
  The details include TA information, Course Offering information, and the number of hours assigned.
  It also handles error cases where no TA is selected, no Course is selected, or an invalid hours value is provided.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link rel='stylesheet' href='taAssigned.css'>
</head>
<body>
<?php include "connecttodb.php";
include "nav.php";
if(isset($_POST['ta-list']) && isset($_POST['co-list']) && $_POST['hours']>0){
 $tauserid = $_POST['ta-list'];
 $coid = $_POST['co-list'];
 $hours = $_POST['hours'];
if($tauserid && $coid && $hours){
$query = "select * from courseoffer join course on coursenum=whichcourse;";
$result = mysqli_query($connection,$query); 
$row = mysqli_fetch_assoc($result);

$query2 = "select * from ta where tauserid = '$tauserid'";
$result2 = mysqli_query($connection,$query2);
$row2 = mysqli_fetch_assoc($result2); 

echo "<h1>TA Has Been Assigned to Course Offering</h1>";
echo "<div><div><h2>TA Information: </h2>";
echo "<h4>TA User ID: " . $tauserid . "</h4>";
echo "<h4>First Name: " .$row2['firstname']. "</h4>";
echo "<h4>Last Name: ".$row2['lastname']. "</h4>";
echo "<h4>Student Number: ".$row2['lastname']. "</h4>";
echo "<h4>Degree: ".$row2['degreetype']. "</h4>";
if($row2['image'] != NULL && $row2['image'] != 'NULL'){
echo "<img class='images' src='".$row2['image']. "' height=100 width=100></div>";
}else{
  echo "<img class='images' src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' height=100 width=100></div>";
}
echo "<div><h2>Course Information: </h2>";
echo "<h4>Course Offering ID: " . $coid . "</h4>";
echo "<h4>Course Name: " .$row['coursename']. "</h4>";
echo "<h4>Course Number: ".$row['coursenum']. "</h4>";
echo "<h4>Term: ".$row['term']. "</h4>";
echo "<h4>Year: ".$row['year']. "</h4>";
echo "<h4>Number of Students: ".$row['numstudent']. "</h4>";
echo "<img class='images' src='https://pbs.twimg.com/profile_images/1327348564658434050/IGT87E6l_400x400.jpg' height=100 width=100></div>";
echo "<h2 style='margin-top: 30px'>Hours: $hours</h4>";
}}else if(!isset($_POST['ta-list'])){
echo "<h2>Error: No TA Selected</h2>";
}else if(!isset($_POST['co-list'])){
echo "<h2>Error: No Course Selected</h2>";
}else if($_POST['hours']<=0){
echo "<h2>Error: Invalid Hours Value</h2>";
}
echo "<form action='mainmenu.php' style='margin-top: 30px;'><button>Home</button></form></div>";
$query = "INSERT INTO hasworkedon VALUES('$tauserid','$coid','$hours');";
$result = mysqli_query($connection,$query); 
?>
</body>
</html>
