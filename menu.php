<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="topnav" id="myTopnav">
    <a href="index.php">
      <img src="img\education.svg" alt="Logo" width="30" height="24">
      My KPI
    </a>
    <a href="index.php" <?php echo ($current_page == 'index.php') ? 'class="active"' : ''; ?>>Profile</a>
    <a href="my_kpi.php" <?php echo ($current_page == 'my_kpi.php') ? 'class="active"' : ''; ?>>KPI Indicator</a>
    <a href="my_activities.php" <?php echo ($current_page == 'my_activities.php') ? 'class="active"' : ''; ?>>Activities</a>
    <a href="my_challenges.php" <?php echo ($current_page == 'my_challenges.php') ? 'class="active"' : ''; ?>>Challenge and Future Plan</a>
    <a style="float: right;" href="logout.php" class="logout btn btn-danger btn-sm">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
    </a>
</nav>
