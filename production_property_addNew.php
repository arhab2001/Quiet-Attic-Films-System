<?php
  require_once('database/DBConnection.php');
    global $DBConnect; //DBConnection

    if(isset($_POST['submit'])){
      $productionID_Fk = $_POST['productionID_Fk'];
      $propertyID_FK = $_POST['propertyID_FK'];
      $locationID_Fk = $_POST['locationID_Fk'];

      //echo $productionID_Fk .'|'. $locationID_Fk;  
      //$sql = "INSERT INTO production_location ('productionID_Fk', 'locationID_Fk') VALUES ('$productionID_Fk','$locationID_Fk')";
      $SQL = "INSERT INTO `production_location`(`productionID_Fk`, `propertyID_FK`, `locationID_Fk`) VALUES ('$productionID_Fk','$propertyID_FK','$locationID_Fk')";

        if(mysqli_query($DBConnect,$SQL)){
            echo'<script> location.replace("production_property.php")</script>';
        }else{
            echo "Some thing Error : " .$DBConnect->error;
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
        <div class="Production Location">
        <form action="production_propety_addNew.php" method="post">

           <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Production ID</label>
              <select class="form-control" name="productionID_Fk">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT productionID FROM `production`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $productionID = $row['productionID'];
                ?>
                <option><?php echo $productionID ?></option>
                <?php }?>
              </select>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Property ID</label>
              <select class="form-control" name="propertyID_FK">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT propertyID FROM `property`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $propertyID = $row['property'];
                ?>
                <option><?php echo $propertyID ?></option>
                <?php }?>
              </select>
            </div>
             
            <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputClientName">Location ID</label>
              <select class="form-control" name="locationID_Fk">
                <?php 
                global $DBConnect; //DBConnection
                $SQL = "SELECT locationID FROM `location`";
                $result = mysqli_query($DBConnect,$SQL);
    
                while ($row = mysqli_fetch_array($result)) {
                  $locationID = $row['locationID'];
                ?>
                <option><?php echo $locationID ?></option>
                <?php }?>
              </select>
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
