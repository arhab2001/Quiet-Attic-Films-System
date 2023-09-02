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
        <p class="font-weight-bold">Production Property</p>
      </div>
      <div class="Production Property">

        <button type="button" class="btn btn-outline-primary"><a href="production_property_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Production Property ID</th>
              <th scope="col">Production ID</th>
              <th scope="col">Property ID</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `production_property`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $production_propertyID  = $row['production_propertyID '];
              $productionID_Fk = $row['productionID_Fk'];
              $propertyID_FK  = $row['propertyID_FK '];

            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $production_propertyID ?></td>
                <td><?php echo $productionID_Fk ?></td>
                <td><?php echo $propertyID_FK ?></td>


                <td>
                  <button class="btn btn-success"> <a href="production_property_edit.php?edit=<?php echo $production_propertyID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="production_property_delete.php?del=<?php echo $production_propertyID ?>" class="text_light"> Delete</a></button>
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