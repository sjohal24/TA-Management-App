<?php   
// This script fetches TA information based on the selected order type and generates dropdown options
// Include the connection file to connect to the database
include "connecttodb.php";

// Get the order type from the POST request
$order = $_POST["order-type"];

// Choose the appropriate query based on the selected order type
if ($order == "last-desc") {
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta order by lastname desc";   
} elseif ($order == "last-asc") {
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta order by lastname asc";   
} elseif ($order == "degree-order") {
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta order by degreetype";   
} elseif ($order == "phd-order") {
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta where degreetype='phd'";   
} elseif ($order == "masters-order") {
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta where degreetype='masters'";   
} else {
    // Default case if no valid order type is selected
    $query = "select tauserid, firstname, lastname, studentnum, degreetype from ta";   
}

// Execute the query
$result = mysqli_query($connection, $query);   

// Check if the query was successful
if (!$result) {     
    die("Databases query failed.");   
}   

// Output the options for the dropdown menu
echo "<option> Select Here </option>"; 
while ($row = mysqli_fetch_assoc($result)) { 
    echo "<option value='" . $row["tauserid"] . "' >";
    echo $row["tauserid"]  . "  |  " . $row["firstname"] . "  |  " . $row["lastname"] . "  |  " . $row["studentnum"] . "  |  " . $row["degreetype"]; 
    echo "</option>"; 
}

// Free up the result set
mysqli_free_result($result);
?>
