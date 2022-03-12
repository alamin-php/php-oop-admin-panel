<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
<?php if($userRole != '0'){
  echo "<script>window.location='404.php'</script>";
} 
?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/classes/User.php");
?>
<?php 
  $user = new User();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $addUser = $user->addUser($_POST);
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Add a new unique user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">user</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 col-md-offset-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a new user</h3>
                        <a href="userlist.php" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-undo"></i> Back</a>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1">Editor</option>
                                    <option value="2">Author</option>
                                    <option value="3">General User</option>
                                </select>
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" id="password" placeholder="Enter password">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-sm btn-primary btn-flat"><i
                                    class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
                    <?php 
                      if(isset($addUser)){
                        echo $addUser;
                      }
                    ?>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("inc/footer.php"); ?>