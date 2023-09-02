<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$staff_typeID = $_GET['edit'];


$sql = "SELECT * FROM staff_type WHERE staff_typeID = '$staff_typeID'";
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $staff_typeID  = $row['staff_typeID'];
  $staff_type_name = $row['staff_type_name'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
  $staff_typeID = $_GET['edit'];
  $staff_type_name = $_POST['staff_type_name'];

  $SQL = "UPDATE `staff_type` SET `staff_type_name`='$staff_type_name' WHERE staff_typeID = '$staff_typeID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("staff_type.php")</script>';
  } else {
    echo "Some thing Error" . $DBConnect->error;
  }
}
?>
<?php
include_once('includes/header.php')
?>

<body>
  <div class="grid-container">

    <!-- Header -->
    <?php
    include_once('includes/navbar.php')
    ?>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php
    include_once('includes/sidebar.php')
    ?>
    <!-- End Sidebar -->

    <!-- Production Body -->
    <main class="main-container">
      <div class="main-title">
        <p class="font-weight-bold">Enter the Edit Information</p>
      </div>
      <div class="Staff Type">
        <form action="staff_type_edit.php?edit=<?php echo $staff_typeID; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Staff Type Name</label>
              <input type="text" name="staff_type_name" class="form-control" id="inputClientName" value="<?php echo $staff_type_name?>">
            </div>
                <div class="form-group">
                  <div class="form-check">
                  </div>
                </div>
                <button type="Submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </main>

    <!-- End Main -->

  </div>

  <?php
  include_once('includes/footer-scripts.php')
  ?>