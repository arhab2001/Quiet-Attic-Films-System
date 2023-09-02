<?php
  require_once('database/DBConnection.php');
    global $DBConnect; //DBConnection




    if(isset($_POST['submit']))
    {
      $property_name = $_POST['property_name'];
      $description = $_POST['description'];

        $sql = "INSERT INTO property (property_name, description) VALUES ('$property_name','$description')";

        if(mysqli_query($DBConnect,$sql))
        {
            echo'<script> location.replace("property.php")</script>';
        }
        else
        {
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

      <!-- Body -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Enter the Information</p>
        </div>
        <div class="Property">
        <form action="property_addNew.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Property Name</label>
              <input type="text" name="property_name" class="form-control" id="inputClientName">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactPerson">Description</label>
              <input type="text" name="description" class="form-control" id="inputContactPerson">
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
