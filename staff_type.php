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
        <p class="font-weight-bold">Staff Type</p>
      </div>
      <div class="Staff Type">

        <button type="button" class="btn btn-outline-primary"><a href="staff_type_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Staff Type ID</th>
              <th scope="col">Staff Type Name</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `staff_type`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $staff_typeID = $row['staff_typeID'];
              $staff_type_name = $row['staff_type_name'];
            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $staff_typeID ?></td>
                <td><?php echo $staff_type_name ?></td>


                <td>
                  <button class="btn btn-success"> <a href="staff_type_edit.php?edit=<?php echo $staff_typeID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="staff_type_delete.php?del=<?php echo $staff_typeID ?>" class="text_light"> Delete</a></button>
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