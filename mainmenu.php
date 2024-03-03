<!-- 
    This HTML file represents the main page of the TA Management System.
    It includes navigation, sorting options for TA information, a list of TAs, and buttons for various actions such as adding, deleting, updating TAs, and managing course information.
    The sorting options use radio buttons with a visually appealing design.
    The forms are set to trigger corresponding PHP scripts for processing.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>TA Management System</title>
<link rel="stylesheet" href="a3.css">  
</head>
  <body>
    <?php include "connecttodb.php"; 
    include "nav.php";
    ?>
    <div class="forms-div">
      <h1>TA Management System</h1>

      <form
        action="getinfo.php"
        method="post"
        id="sort-button"
        onsubmit="submitForm(event)"
      >
        <div class="wrapper">
          <div class="box">
            <input
              type="radio"
              value="last-asc"
              name="order-type"
              id="option-1"
              onchange="submitForm(event)"
            />
            <input
              type="radio"
              value="last-desc"
              name="order-type"
              id="option-2"
              onchange="submitForm(event)"
            />
            <input
              type="radio"
              value="degree-order"
              name="order-type"
              id="option-3"
              onchange="submitForm(event)"
            />
            <input
              type="radio"
              value="masters-order"
              name="order-type"
              id="option-4"
              onchange="submitForm(event)"
            />
            <input
              type="radio"
              value="phd-order"
              name="order-type"
              id="option-5"
              onchange="submitForm(event)"
            />

            <label for="option-1" class="option-1">
              <div class="dot"></div>
              <div class="text">Last Name A-Z</div>
            </label>
            <label for="option-2" class="option-2">
              <div class="dot"></div>
              <div class="text">Last Name Z-A</div>
            </label>
            <label for="option-3" class="option-3">
              <div class="dot"></div>
              <div class="text">Degree</div>
            </label>
            <label for="option-4" class="option-4">
              <div class="dot"></div>
              <div class="text">Masters</div>
            </label>
            <label for="option-5" class="option-5">
              <div class="dot"></div>
              <div class="text">PhD</div>
            </label>
          </div>
        </div>
      </form>

      <form action="thisinfo.php" method="post" class="ta-list">
        <select name="ta-list" id="ta-list" class="form-select-lg">
          <?php include "getinfo.php"; ?>
        </select>
      </form>

      <form action="addTA.php" method="post" id="ta-changes">
        <button>Add</button>
      </form>

      <form action="deleteTA.php">
        <button>Delete</button>
      </form>

      <form action="selectUpdate.php">
        <button>Update</button>
      </form>

      <form action="assignCourse.php">
        <button>Assign Course Offering</button>
      </form>

      <form action="selectCourse.php">
        <button>Course Information</button>
      </form>

      <form action="tahasworked.php">
        <button>TA Work History</button>
      </form>

      <form action="courseofferinfo.php">
        <button>Course Offering TAs</button>
      </form>
    </div>

    <script src="a3.js"></script>
  </body>
</html>
