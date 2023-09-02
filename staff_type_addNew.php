<?php
  require_once('database/DBConnection.php');
    global $DBConnect; //DBConnection

    if(isset($_POST['submit']))
    {
      $staff_type_name = $_POST['staff_type_name'];

        $sql = "INSERT INTO staff_type (staff_type_name) VALUES ('$staff_type_name')";

        if(mysqli_query($DBConnect,$sql))
        {
            echo'<script> location.replace("staff_type.php")</script>';
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

      <!-- Production Body -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">Enter the Information</p>
        </div>
        <div class="Staff Type">
        <form action="staff_type_addNew.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Staff Type Name</label>
              <input type="text" name="staff_type_name" class="form-control" id="inputClientName">
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
