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
        <p class="font-weight-bold">Location</p>
      </div>
      <div class="Location">

        <button type="button" class="btn btn-outline-primary"><a href="location_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Location ID</th>
              <th scope="col">Location Name</th>
              <th scope="col">Address</th>
              <th scope="col">Contact Email</th>
              <th scope="col">Contact Phone</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `location`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $locationID = $row['locationID'];
              $location_name = $row['location_name'];
              $address = $row['address'];
              $contact_email = $row['contact_email'];
              $contact_phone = $row['contact_phone'];

            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $locationID ?></td>
                <td><?php echo $location_name ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $contact_email ?></td>
                <td><?php echo $contact_phone ?></td>


                <td>
                  <button class="btn btn-success"> <a href="location_edit.php?edit=<?php echo $locationID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="location_delete.php?del=<?php echo $locationID ?>" class="text_light"> Delete</a></button>
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