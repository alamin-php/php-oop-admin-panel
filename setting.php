<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>


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
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="company_name">Name</label>
                  <input type="text" class="form-control" id="company_name" placeholder="Enter company name">
                </div>
                <div class="form-group">
                  <label for="company_name">Address</label>
                  <input type="text" class="form-control" id="company_name" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label for="company_phone">Phone</label>
                  <input type="text" class="form-control" id="company_phone" placeholder="Enter phone number">
                </div>
                <div class="form-group">
                  <label for="company_email">Email address</label>
                  <input type="text" class="form-control" id="company_email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                  <label for="company_website">Website</label>
                  <input type="text" class="form-control" id="company_website" placeholder="Enter website">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-pencil"></i> Update</button>
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