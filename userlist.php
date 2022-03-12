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
?>
<?php 
  if(isset($_GET['userId'])){
    $id = $_GET['userId'];
    $user->deleteUser($id);
  }
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
        <h1>
            User
            <small>View all listed user name</small>
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
              <h3 class="box-title">All user list</h3>
              <a href="useradd.php" class="btn btn-sm btn-default btn-flat pull-right"><i class="fa fa-plus"></i> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Full name</th>
                  <th>User name</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $i=0;
                    $users = $user->readAllUser();
                    if($users){
                      while($result = $users->fetch_assoc()){
                        $i++;
                        ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $result['name'] ?></td>
                          <td><?php echo $result['username'] ?></td>
                          <td>
                            <?php if($result['role'] == 0) : ?>
                              <span class="label label-success">Admin</span>
                            <?php endif; ?>
                            <?php if($result['role'] == 1) : ?>
                              <span class="label label-primary">Editor</span>
                            <?php endif; ?>
                            <?php if($result['role'] == 2) : ?>
                              <span class="label label-info">Author</span>
                            <?php endif; ?>
                            <?php if($result['role'] == 3) : ?>
                              <span class="label label-default">General User</span>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($result['status'] == 0) : ?>
                              <span class="label label-success">Active</span>
                            <?php endif; ?>
                            <?php if($result['status'] == 1) : ?>
                              <span class="label label-warning">Inactive</span>
                            <?php endif; ?>
                          </td>
                          <td><a href="useredit.php?userId=<?php echo $result['id']; ?>" class="btn btn-sm btn-default btn-flat"><i class="fa fa-pencil"></i></a> <a onclick="return confirm('Are you sure to delete?');" href="?userId=<?php echo $result['id']; ?>" class="btn btn-sm btn-default btn-flat"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php
                  ?>
                <?php } ?>
                <?php } ?>
                
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>Serial</th>
                  <th>Full name</th>
                  <th>User name</th>
                  <th>Role</th>
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