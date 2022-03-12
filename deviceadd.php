<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Device
            <small>Add a new unique name of device</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
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
              <h3 class="box-title">Add a new device</h3>
              <a href="devicelist.php" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-undo"></i> Back</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="device_id">device id</label>
                  <input type="text" class="form-control" id="device_id" placeholder="Enter device MAC address">
                </div>
                <div class="form-group">
                  <label for="device_name">Device name</label>
                  <input type="text" class="form-control" id="device_name" placeholder="Enter device name">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Submit</button>
              </div>
            </form>
          </div>
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