<?php
  require_once('database/DBConnection.php');
    global $DBConnect; //DBConnection

    if(isset($_POST['submit']))
    {
      $client_name = $_POST['client_name'];
      $client_address = $_POST['client_address'];
      $contact_email = $_POST['contact_email'];
      $contact_phone = $_POST['contact_phone'];

        $sql = "INSERT INTO client (client_name, client_address, contact_email, contact_phone) VALUES ('$client_name','$client_address', '$contact_email', '$contact_phone')";

        if(mysqli_query($DBConnect,$sql))
        {
            echo'<script> location.replace("client.php")</script>';
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
        <div class="PRODUCTION">
        <form action="client_addNew.php" method="post">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Client Name</label>
              <input type="text" name="client_name" class="form-control" id="inputClientName">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactPerson">Client Address</label>
              <input type="text" name="client_address" class="form-control" id="inputContactPerson">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEontactEmail">Contact Email</label>
              <input type="text" name="contact_email" class="form-control" id="inputEontactEmail">
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputContactPhone">Contact Phone</label>
              <input type="text" name="contact_phone" class="form-control" id="inputContactPhone">
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
