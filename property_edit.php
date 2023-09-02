<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$propertyID = $_GET['edit'];


$sql = "SELECT * FROM property WHERE propertyID = '$propertyID'";
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $propertyID = $row['propertyID'];
  $property_name = $row['property_name'];
  $description = $row['description'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
  $propertyID  = $_GET['edit'];
  $property_name = $_POST['property_name'];
  $description = $_POST['description'];

  $SQL = "UPDATE `property` SET `property_name`='$property_name',`description`='$description' WHERE propertyID = '$propertyID'";
  //$SQL = "UPDATE `property` SET `property_name`='$property_name',`description`='$description' WHERE propertyID = '$propertyID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("property.php")</script>';
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
      <div class="Property">
        <form action="property_edit.php?edit=<?php echo $propertyID; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Property Name</label>
              <input type="text" name="property_name" class="form-control" id="inputClientName" value="<?php echo $property_name ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContactPerson">Description</label>
                <input type="text" name="description" class="form-control" id="inputContactPerson" value="<?php echo $description ?>">
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