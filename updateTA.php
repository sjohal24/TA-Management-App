<!DOCTYPE html>
<html>
  <head>
    <title>Update TA Menu</title>
  </head>
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
            font-size: 80px;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
        }

        h3, h4 {
            margin: 10px 0;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin: 6px 0;
            box-sizing: border-box;
        }

        button {
            background-color: #4285f4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            margin-right: 20px;
        }

        button:hover {
            background-color: #3c74ce;
        }

        .checkbox-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        input[type="checkbox"] {
        margin-left: 80%;
        }
        .taid{
          font-size: 24px;
          margin-bottom: 30px;
        }

    </style>
  <body>
<?php include "connecttodb.php";
include "nav.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the POST request
    $currentid = $_POST["tauserid"];
echo "<script> console.log('$currentid')</script>";
}
?>

    <h1>Update TA Info</h1>
<form action='insertUpdate.php'  method = "post" id="submit-form">
<?php  echo "<input type='hidden' id='old-tauserid' name = 'tauserid' value= '" . $currentid  . "'/>";
echo "<h3 class='taid'>Ta User ID: $currentid<h3>";
?>
    <h3>First Name</h3>
    <input type="text" placeholder="John" id="new-firstname" name="first-name"/>
    <h3>Last Name</h3>
    <input type="text" placeholder="Smith" id="new-lastname" name="last-name"/>
    <h3>Student ID</h3>
    <input type="text" placeholder="251000111" id="new-studentnum" name="studentnum"/>
    <div>
      <label for="degree"><h3>Degree Type:</h3></label>
      <select id="degrees" name="degrees">
        <option>N/A</option>
        <option value="Masters">Masters</option>
        <option value="PhD">PhD</option>
      </select>
    </div>
    <h3>Image</h3>
    <input type="text" placeholder="https://photo.com/photo.png" name="ta-image"/>
<?php 
$query = "select * from ta";
$result = mysqli_query($connection,$query); 
$taArray = array();     
$count = 0;

while ($row = mysqli_fetch_assoc($result)) {
$taObject = array('tauserid' => $row["tauserid"], 'studentnum' => $row["studentnum"]);
$taArray[$count] = $taObject;
$count++;
}
$jsonTaArray = json_encode($taArray);
$jscurrentid = json_encode($currentid);
?>  
<button id="submit-button" type="button" onclick="submitButtonClick(event)">Submit</button>
<a href="mainmenu.php"><button type='button'>Return</button></a>
</form>
</body>
<script src="addTA.js"></script>
<script>
const submitButton = document.getElementById("submit-button");

let jsTaArray = <?php echo $jsonTaArray;?>;
const newTauserID = document.getElementById('new-tauserid');
const newStudentNum = document.getElementById('new-studentnum');
const newFname = document.getElementById("new-firstname");
const newLname = document.getElementById("new-lastname");
const degree = document.getElementById("degrees");
const onlyContainsNumbers = (str) => /^\d+$/.test(str);
let currentid = <?php echo $jscurrentid ?>;

function checkTA(event) {
for (let i = 0; i < jsTaArray.length; i++) {
if(newStudentNum.value === jsTaArray[i].studentnum && jsTaArray[i].tauserid != currentid){
alert('Error: Duplicate Student Number');
return false;
}
console.log(!onlyContainsNumbers(newStudentNum.value));
console.log(newStudentNum.value.length);
console.log(newStudentNum.value.length != 9);

if(!onlyContainsNumbers(newStudentNum.value) || newStudentNum.value.length != 9){
if(newStudentNum.value.length != 0){
alert("Invalid Student Number");
return false;
}
}
}
return true;
}
displayTA(jsTaArray);
function submitButtonClick (event) {
            event.preventDefault(); // Prevent the default form submission
            if(checkTA()){ // Call your checkTA function
            document.getElementById('submit-form').submit(); // Manually submit the form
        }};

</script>
</html>
