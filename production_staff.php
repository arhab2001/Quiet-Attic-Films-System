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
        <p class="font-weight-bold">Production Staff</p>
      </div>
      <div class="Production Staff">

        <button type="button" class="btn btn-outline-primary"><a href="production_staff_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Production Staff ID</th>
              <th scope="col">Production ID</th>
              <th scope="col">Staff Type ID</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `production_staff`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $production_staffID  = $row['production_staffID'];
              $productionID_Fk = $row['productionID_Fk'];
              $staff_typeID_Fk = $row['staff_typeID_Fk'];
            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $production_staffID ?></td>
                <td><?php echo $productionID_Fk ?></td>
                <td><?php echo $staff_typeID_Fk ?></td>


                <td>
                  <button class="btn btn-success"> <a href="production_staff_edit.php?edit=<?php echo $production_staffID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="production_staff_delete.php?del=<?php echo $production_staffID ?>" class="text_light"> Delete</a></button>
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