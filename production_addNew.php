<?php
require_once('database/DBConnection.php');
global $DBConnect; //DBConnection

if (isset($_POST['submit'])) {
  $clientID_FK = $_POST['clientID_FK'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];

  //echo $clientID_FK .'|'. $title .'|'. $description .'|'.$startdate .'|'. $enddate;
  $SQL = "INSERT INTO `production`(`clientID_FK`, `title`, `description`, `startdate`, `enddate`) VALUES ('$clientID_FK','$title','$description','$startdate','$enddate')";

  if (mysqli_query($DBConnect, $SQL)) {
    echo '<script> location.replace("production.php")</script>';
  } else {
    echo "Some thing Error : " . $DBConnect->error;
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
        <p class="font-weight-bold">Enter the Information</p>
      </div>
      <div class="PRODUCTION">
        <form action="production_addNew.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Client ID</label>
              <select class="form-control" name="clientID_FK">
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
              <input type="text" name="title" class="form-control" id="inputClientName">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContactPerson">Description</label>
                <input type="text" name="description" class="form-control" id="inputContactPerson">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEontactEmail">Startdate</label>
                  <input type="date" name="startdate" class="form-control" id="inputEontactEmail">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputContactPhone">Enddate</label>
                    <input type="date" name="enddate" class="form-control" id="inputContactPhone">
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