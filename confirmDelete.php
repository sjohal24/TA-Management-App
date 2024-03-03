<!-- 
  A Bootstrap-based Delete Confirmation Modal for TA deletion.
  Displays a modal asking the user to confirm the deletion of a TA.
  Provides options to either cancel or proceed with the deletion.
  The TA user ID is sent for deletion if confirmed.
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Bootstrap Delete Confirmation Modal</title>
    <link rel="stylesheet" href="confirmDelete.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php 
    $tauserid = $_POST['tauserid'];
    ?>
    <div id="myModal" class="modal fade" data-backdrop="static">
      <div class="modal-dialog modal-confirm">
        <div class="modal-content">
          <div class="modal-header flex-column">
            <div class="icon-box">
              <i class="material-icons">&#xE5CD;</i>
            </div>
            <h4 class="modal-title w-100">Are you sure?</h4>
          </div>
          <div class="modal-body">
            <?php echo"<p>
              Do you really want to delete TA $tauserid. This process cannot be
              undone.
            </p>"; ?>
          </div>
          <div class="modal-footer justify-content-center">
            <form action="mainmenu.php" method="post">
              <button class="btn btn-secondary">Cancel</button>
            </form>
            <form action="deleteThisTA.php" method="post">
              <?php echo "<input type='hidden' value='$tauserid' name='tauserid' />" ?>
              <button class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function () {
        $('#myModal').modal('show');
      });
    </script>
  </body>
</html>