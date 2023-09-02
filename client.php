<?php
include_once('includes/header.php');
require_once('database/DBConnection.php');
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

    <!-- Client Table -->
    <main class="main-container">
      <div class="main-title">
        <p class="font-weight-bold">Client</p>
      </div>
      <div class="Client">

        <button type="button" class="btn btn-outline-primary"><a href="client_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Client ID</th>
              <th scope="col">Client Name</th>
              <th scope="col">Client Address</th>
              <th scope="col">Contact Email</th>
              <th scope="col">Contact Phone</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `client`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $clientID = $row['clientID'];
              $client_name = $row['client_name'];
              $client_address = $row['client_address'];
              $contact_email = $row['contact_email'];
              $contact_phone = $row['contact_phone'];

            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $clientID ?></td>
                <td><?php echo $client_name ?></td>
                <td><?php echo $client_address ?></td>
                <td><?php echo $contact_email ?></td>
                <td><?php echo $contact_phone ?></td>


                <td>
                  <button class="btn btn-success"> <a href="client_edit.php?edit=<?php echo $clientID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="client_delete.php?del=<?php echo $clientID ?>" class="text_light"> Delete</a></button>
                </td>
              </tr>

            <?php $SNo++;
            } ?>


          </tbody>
        </table>
      </div>
    </main>
    <!-- End Main -->

  </div>

  <?php
  include_once('includes/footer-scripts.php')
  ?>