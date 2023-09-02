<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$productionID  = $_GET['edit'];


$sql = "SELECT * FROM production WHERE productionID = '$productionID'";

echo $sql;
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $productionID  = $row['productionID'];
  $clientID_FK = $row['clientID_FK'];
  $title = $row['title'];
  $description = $row['description'];
  $startdate = $row['startdate'];
  $enddate = $row['enddate'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
    $productionID  = $_POST['edit'];
    $clientID_FK  = $_POST['clientID_FK'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];


  $SQL = "UPDATE `production` SET `clientID_FK`='$clientID_FK',`title`='$title',`description`='$description',`startdate`='$startdate',`enddate`='$enddate' WHERE productionID = '$productionID'";


  //$SQL = "UPDATE `production` SET `clientID_FK`='clientID_FK',`title`='title',`description`='description',`startdate`='[startdate]',`enddate`='enddate' WHERE productionID = '$productionID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("production.php")</script>';
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
        <form action="production_edit.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Client ID</label>
              <select class="form-control" name="clientID_FK" value="<?php echo $clientID_FK ?>">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT clientID FROM `client`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $clientID = $row['clientID'];
                ?>
                <option <?php echo $clientID_FK==$clientID? 'selected':'';  ?>><?php echo $clientID ?></option>
                <?php }?>
              </select>
            </div>
            <input type="hidden" name="edit" value="<?php echo $productionID; ?>">
            <div class="form-group col-md-6">
              <label for="inputClientName">Title</label>
              <input type="text" name="title" class="form-control" id="inputClientName" value="<?php echo $title ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContactPerson">Description</label>
                <input type="text" name="description" class="form-control" id="inputContactPerson" value="<?php echo $description ?>">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEontactEmail">Startdate</label>
                  <input type="date" name="startdate" class="form-control" id="inputEontactEmail" value="<?php echo $startdate ?>">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputContactPhone">Enddate</label>
                    <input type="date" name="enddate" class="form-control" id="inputContactPhone" value="<?php echo $enddate ?>">
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
    <!-- Production Body --> 
    <!-- <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Enter the Information</p>
        </div>
            <div class="form-group col-md-6">
            <label for="inputClientName">Client ID</label> -->
            <!-- <input type="text" name="clientID_FK" class="form-control" id="inputclientID_FK" value="<?php echo $clientID_FK ?>"> -->
              <!-- <select class="form-control" name="clientID_FK">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT clientID FROM `client`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $clientID = $row['clientID'];
                ?>
                <option><?php echo $clientID ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputClientName">Title</label>
              <input type="text" name="title" class="form-control" id="inputClientName" value="<?php echo $title ?>">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactPerson">Description</label>
              <input type="text" name="description" class="form-control" id="inputContactPerson" value="<?php echo $description ?>">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEontactEmail">Startdate</label>
              <input type="date" name="startdate" class="form-control" id="inputEontactEmail" value="<?php echo $startdate ?>">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactPhone">Enddate</label>
              <input type="date" name="enddate" class="form-control" id="inputContactPhone" value="<?php echo $enddate ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
            </div>
          </div>
                <button type="Submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </main> -->

    <!-- End Main

  </div>

  <?php
  include_once('includes/footer-scripts.php')
  ?>