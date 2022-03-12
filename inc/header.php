<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
    include "lib/Session.php";
    Session::init();
    Session::checkSession();
    include "lib/Database.php";
    include "helpers/Format.php";

	spl_autoload_register(function($classes){
		include "classes/".$classes.".php";
	});

	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | <?php echo TITLE; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    span.error{
      color: red;
      font-size: 18px;
    }
    span.success{
      color: green;
      font-size: 18px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>NASSA</b>GROUP</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php 
            $userRole = Session::get('role');
            $userName = Session::get('name');
            $userImage = Session::get('image');
            $created_at = Session::get('created_at');
          ?>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php 
                    if($userImage){?>
                        <img src="<?php echo $userImage; ?>" class="user-image" alt="User Image">
                    <?php    
                    }else{
                        ?>
                        <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        
                        <?php
                    }
                  ?>
              <span class="hidden-xs"><?php echo $userName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <?php 
                    if($userImage){?>
                        <img src="<?php echo $userImage; ?>" class="img-circle" alt="User Image">
                    <?php    
                    }else{
                        ?>
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        
                        <?php
                    }
                  ?>
                  <?php 
                    if(isset($_GET["action"]) AND $_GET["action"] == "logout"){
                      Session::destroy();
                    }
                  ?>
                <p>
                  <?php echo $userName; ?> - 
                  <?php 
                    if($userRole == '0'){
                      echo "Admin";
                    }elseif($userRole == '1'){
                      echo "Editor";
                    }elseif($userRole == '2'){
                      echo "Author";
                    }elseif($userRole == '3'){
                      echo "General User";
                    }
                  ?>
                  <small>Member since <?php echo $fm->formatDate($created_at); ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a  onclick="return confirm('Are you sure to LOGOUT?')" href="?action=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>