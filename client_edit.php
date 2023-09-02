<!-- edit -->
<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
$clientID = $_GET['edit'];


$sql = "SELECT * FROM client WHERE clientID = '$clientID'";
$run = mysqli_query($DBConnect, $sql);

while ($row = mysqli_fetch_array($run)) {
  $clientID = $row['clientID'];
  $client_name = $row['client_name'];
  $client_address = $row['client_address'];
  $contact_email = $row['contact_email'];
  $contact_phone = $row['contact_phone'];
}

?>

<!-- edit End  -->

<?php
if (isset($_POST['submit'])) {
  $clientID = $_GET['edit'];
  $client_name = $_POST['client_name'];
  $client_address = $_POST['client_address'];
  $contact_email = $_POST['contact_email'];
  $contact_phone = $_POST['contact_phone'];

  //echo $clientID .'|'. $client_name .'|'. $client_address .'|'.$contact_email .'|'. $contact_phone;

  $SQL = "UPDATE `client` SET `client_name`='$client_name',`client_address`='$client_address',`contact_email`='$contact_email',`contact_phone`='$contact_phone' WHERE clientID = '$clientID'";

  if (mysqli_query($DBConnect, $SQL)) {
    echo "DB Status" . $DBConnect->error;
    echo '<script> location.replace("client.php")</script>';
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
        <form action="client_edit.php?edit=<?php echo $clientID; ?>" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputClientName">Client Name</label>
              <input type="text" name="client_name" class="form-control" id="inputClientName" value="<?php echo $client_name ?>">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputContactPerson">Client Address</label>
                <input type="text" name="client_address" class="form-control" id="inputContactPerson" value="<?php echo $client_address ?>">
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