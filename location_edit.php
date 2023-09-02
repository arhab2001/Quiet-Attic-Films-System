<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$locationID = $_GET['edit'];


$sql = "SELECT * FROM location WHERE locationID = '$locationID'";
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $locationID = $row['locationID'];
  $location_name = $row['location_name'];
  $address = $row['address'];
  $contact_email = $row['contact_email'];
  $contact_phone = $row['contact_phone'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
  $locationID = $_GET['edit'];
  $location_name = $_POST['location_name'];
  $address = $_POST['address'];
  $contact_email = $_POST['contact_email'];
  $contact_phone = $_POST['contact_phone'];


  $SQL = "UPDATE `location` SET `location_name`='$location_name',`address`='$address',`contact_email`='$contact_email',`contact_phone`='$contact_phone' WHERE locationID = '$locationID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("location.php")</script>';
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
      <div class="LocationID">
        <form action="location_edit.php?edit=<?php echo $locationID; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Location Name</label>
              <input type="text" name="location_name" class="form-control" id="inputlocation_name" value="<?php echo $location_name ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContactPerson">Address</label>
                <input type="text" name="address" class="form-control" id="inputaddress" value="<?php echo $address ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEontactEmail">Contact Email</label>
                  <input type="text" name="contact_email" class="form-control" id="inputEontactEmail" value="<?php echo $contact_email ?>">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputContactPhone">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control" id="inputContactPhone" value="<?php echo $contact_phone ?>">
                  </div>
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