<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$production_locationID  = $_GET['edit'];


$sql = "SELECT * FROM production_location WHERE production_locationID = '$production_locationID'";

echo $sql;
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $production_locationID  = $row['production_locationID'];
  $productionID_Fk  = $row['productionID_Fk'];
  $locationID_Fk = $row['locationID_Fk'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
    $production_locationID  = $_POST['edit'];
    $productionID_Fk  = $_POST['productionID_Fk'];
    $locationID_Fk = $_POST['locationID_Fk'];


  //$SQL = "UPDATE `production_location` SET `productionID_Fk`='$productionID_Fk',`locationID_Fk`='$locationID_Fk'";

  echo $productionID_Fk .'|'. $locationID_Fk; 
  //$SQL = "UPDATE `production` SET `clientID_FK`='clientID_FK',`title`='title',`description`='description',`startdate`='[startdate]',`enddate`='enddate' WHERE productionID = '$productionID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("production_location_edit.php")</script>';
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
      <div class="PRODUCTION">
        <form action="production_location.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Production ID</label>
              <select class="form-control" name="productionID_Fk" value="<?php echo $productionID_Fk ?>">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT productionID FROM `production`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $productionID = $row['productionID'];
                ?>
                <option <?php echo $productionID_Fk==$productionID? 'selected':'';  ?>><?php echo $productionID ?></option>
                <?php }?>
              </select>
            </div>
            <input type="hidden" name="edit" value="<?php echo $production_locationID; ?>">
            
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Location ID</label>
              <select class="form-control" name="locationID_Fk" value="<?php echo $locationID_Fk ?>">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT locationID FROM `location`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $locationID = $row['locationID'];
                ?>
                <option <?php echo $locationID_Fk==$locationID? 'selected':'';  ?>><?php echo $locationID ?></option>
                <?php }?>
              </select>
            </div>
            <input type="hidden" name="edit" value="<?php echo $production_locationID; ?>">
                <button type="Submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </main>

  <?php
  include_once('includes/footer-scripts.php')
  ?>