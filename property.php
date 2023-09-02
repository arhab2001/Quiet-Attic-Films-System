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
        <p class="font-weight-bold">Property</p>
      </div>
      <div class="Client">

        <button type="button" class="btn btn-outline-primary"><a href="property_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property ID</th>
              <th scope="col">Property Name</th>
              <th scope="col">Description</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `property`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $propertyID = $row['propertyID'];
              $property_name = $row['property_name'];
              $description = $row['description'];

            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $propertyID ?></td>
                <td><?php echo $property_name ?></td>
                <td><?php echo $description ?></td>


                <td>
                  <button class="btn btn-success"> <a href="property_edit.php?edit=<?php echo $propertyID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="property_delete.php?del=<?php echo $propertyID ?>" class="text_light"> Delete</a></button>
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