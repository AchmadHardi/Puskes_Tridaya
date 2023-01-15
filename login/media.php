<?php
include 'config/connection.php';
if (isset($_GET['logout'])) {
  session_destroy();
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'layout/head.php'; ?>
<head>
</head>
<body class="sidebar-pinned">
  <?php include 'layout/sidebar.php'; ?>
  <main class="admin-main">
    <?php include 'layout/header.php'; ?>
    <?php 
    $page = isset($_GET['module']) ? $_GET['module'] : 'dashboard.php';
    if (isset($_GET['module'])) {
      $act = isset($_GET['act']) ? '/'.$_GET['act'].'.php' : '/index.php';
    }else{
      $act = '';
    }
    include 'module/'.$page.$act;
    ?>
  </main>
  <?php include 'layout/search.php'; ?>
  <script src='assets/bundles/85bd871e04eb889b6141c1aba0fedfa1a2215991.js'>
  </script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3">
  </script>
  <script>
    window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-66116118-3'); 
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src='assets/bundles/ba78fede76f682cd388ed2abbfd1e1568e76f8a4.js'>
  </script>
  <script src='assets/js/c36248babf70a3c7ad1dcd98d4250fa60842eea9/light/assets/vendor/apexchart/apexcharts.min.js'></script>
  <script src='assets/js/2c8f15355f13df1646ab6cb9c0a8fc4fee1de09a/default/assets/js/dashboard-02.js'></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <?php unset($_SESSION['flash']) ?>
</body>
</html>