<?php include("inc/header.php"); ?>
<?php include("inc/sidebar.php"); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
            <small>Add a new product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add a new product</h3>
                        <a href="productlist.php" class="btn btn-sm btn-default btn-flat pull-right"><i
                                class="fa fa-undo"></i> Back</a>
                    </div>
                    <!-- /.box-header -->
                    <form action="" method="POST">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="device_id">Device ID</label>
                                        <input type="text" name="" class="form-control"
                                            id="device_id" placeholder="Enter device id">
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="product_id">Product Name</label>
                                        <input type="text" name="" class="form-control"
                                            id="product_id" placeholder="Enter product name">
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select name="" id="brand_id" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="1">Brand One</option>
                                            <option value="2">Brand Two</option>
                                            <option value="3">Brand Three</option>
                                        </select>
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong></strong>
                                        </span>
                                       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="desig_id">Section</label>
                                        <select name="" id="desig_id" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="1">Section One</option>
                                            <option value="2">Section Two</option>
                                            <option value="3">Section Three</option>
                                        </select>
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <!-- end row  -->
                            </div>
                        </div>
                        <div class="box-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>


</div>
<!-- /.content-wrapper -->
<?php include("inc/footer.php"); ?>