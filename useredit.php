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
    if(!isset($_GET["userId"]) || $_GET["userId"] == NULL){
        echo "<script>window.location='userlist.php'</script>";
    }else{
        $id = $_GET["userId"];
    }
	$user = new User();
	if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["update"])){
		$updateUser = $user->updateUser($_POST, $id);
	}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Update user information</small>
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
                        <h3 class="box-title">Update</h3>
                        <a href="userlist.php" class="btn btn-sm btn-default btn-flat pull-right"><i
                                class="fa fa-undo"></i> Back</a>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                     $userById = $user->userById($id);
                        if($userById){
                            while($result = $userById->fetch_assoc()){
                    ?>
                    <form role="form" action="" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="<?php echo $result['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    value="<?php echo $result['username']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Select One</option>
                                    <option value="1" <?php if($result['role'] == '1'){ echo "selected";} ?>>Editor
                                    </option>
                                    <option value="2" <?php if($result['role'] == '2'){ echo "selected";} ?>>Author
                                    </option>
                                    <option value="3" <?php if($result['role'] == '3'){ echo "selected";} ?>>General
                                        User</option>
                                </select>
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="status" value="0" <?php if($result['status'] == '0'){ echo "checked";} ?> ><span class="label label-success">Active</span>
                                </label>
                                <label>
                                    <input type="radio" name="status" id="status" value="1" <?php if($result['status'] == '1'){ echo "checked";} ?>><span class="label label-danger">Inactive</span>
                                </label>
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
                      if(isset($updateUser)){
                        echo $updateUser;
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