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

    <!-- Production Table -->
    <main class="main-container">
      <div class="main-title">
        <p class="font-weight-bold">Production</p>
      </div>
      <div class="Production">

        <button type="button" class="btn btn-outline-primary"><a href="production_addNew.php"> Add New </a></button>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Production ID</th>
              <th scope="col">Client ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Startdate</th>
              <th scope="col">Enddate</th>
              <th scope="col">Option</th>
            </tr>
          </thead>
          <tbody>
            <?php
            
            global $DBConnect; //DBConnection
            $sql = "SELECT * FROM `production`";
            $run = mysqli_query($DBConnect, $sql);

            $SNo = 1;
            while ($row = mysqli_fetch_array($run)) {
              $productionID = $row['productionID'];
              $clientID_FK = $row['clientID_FK'];
              $title = $row['title'];
              $description = $row['description'];
              $startdate = $row['startdate'];
              $enddate = $row['enddate'];

            ?>

              <tr>
                <td><?php echo $SNo ?></td>
                <td><?php echo $productionID ?></td>
                <td><?php echo $clientID_FK ?></td>
                <td><?php echo $title ?></td>
                <td><?php echo $description ?></td>
                <td><?php echo $startdate ?></td>
                <td><?php echo $enddate ?></td>


                <td>
                  <button class="btn btn-success"> <a href="production_edit.php?edit=<?php echo $productionID ?>" class="text_light">Edit</a></button> &nbsp;
                  <button class="btn btn-danger"> <a href="production_delete.php?del=<?php echo $productionID ?>" class="text_light"> Delete</a></button>
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