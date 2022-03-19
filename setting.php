<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>
<?php if($userRole != '0'){
  echo "<script>window.location='404.php'</script>";
} 
?>
<?php 
    $st = new Settings();
    $setting = $st->viewSetting();
?>
<?php
error_reporting(0);
	if($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["update"])){
		$updateSetting = $settings->updateSetting($_POST);
	}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Settings
            <small>Update your company all details</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update company details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
              if($setting){
                while($result = $setting->fetch_assoc()){
            ?>
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="company_name">Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
                </div>
                <div class="form-group">
                  <label for="company_name">Address</label>
                  <input type="text" class="form-control" name="address" value="<?php echo $result['address']; ?>">
                </div>
                <div class="form-group">
                  <label for="company_phone">Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $result['phone']; ?>">
                </div>
                <div class="form-group">
                  <label for="company_email">Email address</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $result['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="company_website">Website</label>
                  <input type="text" class="form-control" name="website" value="<?php echo $result['website']; ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="update" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-pencil"></i> Update</button>
              </div>
            </form>
            <?php } ?>
            <?php } ?>
          </div>
          <?php 
            if(isset($updateSetting)){
              echo $updateSetting;
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