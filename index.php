<!DOCTYPE html>
<html lang="en">
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

    <!-- Main -->
    <main class="main-container">
      <div class="main-title">
        <p class="font-weight-bold">DASHBOARD</p>
      </div>

      <div class="main-cards">

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">Production</p>
            <span class="material-icons-outlined text-blue">inventory_2</span>
          </div>
          <span class="text-primary font-weight-bold">249</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">Client</p>
            <span class="material-icons-outlined text-orange">group</span>
          </div>
          <span class="text-primary font-weight-bold">83</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">Property</p>
            <span class="material-icons-outlined text-green">real_estate_agent</span>
          </div>
          <span class="text-primary font-weight-bold">79</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">INVENTORY ALERTS</p>
            <span class="material-icons-outlined text-red">notification_important</span>
          </div>
          <span class="text-primary font-weight-bold">56</span>
        </div>

      </div>

      <div class="charts">

        <div class="charts-card">
          <p class="chart-title">Top 5 Production</p>
          <div id="bar-chart"></div>
        </div>

        <div class="charts-card">
          <p class="chart-title">Client and Property</p>
          <div id="area-chart"></div>
        </div>

      </div>
    </main>
    <!-- End Main -->

  </div>

  <?php
  include_once('includes/footer-scripts.php')
  ?>
</body>

</html>