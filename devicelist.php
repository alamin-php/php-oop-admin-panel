<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Device
            <small>View all listed device name</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">All device list</h3>
              <a href="deviceadd.php" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>device id</th>
                  <th>device name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>89885565</td>
                  <td>Dell</td>
                  <td><span class="label label-success">Active</span></td>
                  <td><a href="" class="btn btn-sm btn-default btn-flat"><i class="fa fa-pencil"></i></a> <a href="" class="btn btn-sm btn-default btn-flat"><i class="fa fa-trash"></i></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>78854522</td>
                  <td>HP</td>
                  <td><span class="label label-warning">Inactive</span></td>
                  <td><a href="" class="btn btn-sm btn-default btn-flat"><i class="fa fa-pencil"></i></a> <a href="" class="btn btn-sm btn-default btn-flat"><i class="fa fa-trash"></i></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                <tr>
                  <th>Serial</th>
                  <th>device name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("inc/footer.php"); ?>