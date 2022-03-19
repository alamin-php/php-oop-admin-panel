<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath."/classes/User.php");
?>
<?php
  $id = Session::get('userId');
	$user = new User();
	if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["update"])){
		$updatePassword = $user->updatePassword($_POST, $id);
	}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Update your password</small>
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
                        <h3 class="box-title">Update password</h3>
                        <a href="userlist.php" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-undo"></i> Back</a>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="old_pass">Old password</label>
                                <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="Enter old password">
                            </div>
                            <div class="form-group">
                                <label for="password">New password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="update" class="btn btn-sm btn-primary btn-flat"><i
                                    class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
                    <?php 
                      if(isset($updatePassword)){
                        echo $updatePassword;
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