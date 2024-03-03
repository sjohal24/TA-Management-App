<!-- This PHP and HTML document displays detailed information about a selected TA, including their profile picture, 
name, student ID, degree, and courses they love or hate. -->

<!DOCTYPE html>
<html>
  <header>
    <title>TA Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            font-size: 100px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }

        h3 {
            margin: 20px 20px;
            color: #555;
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .pfp{
          display: block; /* Make the image a block-level element */
        margin: 0 auto;
        border-radius: 150px;
        }
        button {
            background-color: #4285f4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 20px;
        }

        button:hover {
            background-color: #3c74ce;
        }

        #home {
            margin-top: 20px;
        }
        .pfp{
          display: block; /* Make the image a block-level element */
        height: 400px;
        width: 400px;
        border-radius: 200px;
        margin-top: 20px;
        margin-bottom: 20px;
        }
        .course-pref{
          width: fit-content;
          border-radius: 20px;
          padding: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
          box-sizing: border-box;
        }
    </style>
  </header>
  <body>
    <?php include "nav.php"?>
    <h1>TA Information</h1>
    <form action="mainmenu.php">
<?php
      include "connecttodb.php";
      $whichTA = $_POST["ta-list"];
      $query = "SELECT * FROM ta WHERE '$whichTA' = tauserid";

$result = mysqli_query($connection,$query);
if (!$result) {     die("databases query failed.");   } 
if($row = mysqli_fetch_assoc($result)) 
{ 	
  if ($row["image"]){
    echo "<img src = '" .  $row['image'] . "' width = 300 height = 300 class='pfp'>";
    }else{
    echo "<img class='pfp' src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' width = 300 height = 300>";
    }
    echo "<h3 style='font-size: 60px'>" . $row["lastname"] . ", " . $row["firstname"] . "</h3>"; 
    echo "<h3 style='font-size: 30px'>" .  $row["tauserid"] . " (" . $row['studentnum'] . ")</h3>";
      
echo "<h3>Degree: " . $row['degreetype'] . "</h3>";
}

$query = "select * from ta join loves where tauserid=ltauserid && tauserid='$whichTA'";
$result = mysqli_query($connection,$query);
$query2 = "select * from ta join hates where tauserid=htauserid && '$whichTA'=tauserid";
$result2 = mysqli_query($connection,$query2);

$check = 0;
$check2 = 0;
echo "<h3> Loves Courses: </h3>"; 
while($row = mysqli_fetch_assoc($result)) 
{
$check = 1;
$check2 = 1;
echo "<h3 class='course-pref'>" . $row["lcoursenum"] . "</h3>";
}
if($check2 == 0){
  echo "<h3 class='course-pref'>No Courses</h3>";
}
$check2 = 0;
echo "<h3> Hates Courses: </h3>";
while($row2 = mysqli_fetch_assoc($result2)) 
{
$check = 1;
$check2 = 1;
echo "<h3 class='course-pref'>". $row2["hcoursenum"] . "</h3>";
}if($check2 == 0){
  echo "<h3 class='course-pref'>No Courses</h3>";
}
$check = 0;


?>
<div>
      <button id="home">Return</button>
</div>    
</form>
  </body>
  <script src="thisInfo.js"></script>
</html>
