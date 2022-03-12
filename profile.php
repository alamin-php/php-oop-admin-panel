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
		$updateUserProfile = $user->updateUserProfile($_POST, $_FILES, $id);
	}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small>Update profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
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
                        <h3 class="box-title">Profile</h3>
                        <a href="index.php" class="btn btn-sm btn-default btn-flat pull-right"><i
                                class="fa fa-undo"></i> Back</a>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                     $userProfile = $user->userProfile($id);
                        if($userProfile){
                            while($result = $userProfile->fetch_assoc()){
                    ?>
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?php echo $result['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?php echo $result['username']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="<?php echo $result['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Details</label>
                                <textarea class="form-control" name="details" id="" cols="20" rows="4"><?php echo $result['details']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="username">Profile picture</label>
                                <input type="file" name="image">
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="update" class="btn btn-sm btn-primary btn-flat"><i
                                    class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>
                    <?php } ?>
                    <?php } ?>
                </div>
                <?php 
                      if(isset($updateUserProfile)){
                        echo $updateUserProfile;
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